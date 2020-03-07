<template>
    <div class="col-1 new-users">
        <strong>{{ $t('auth.buyer.reg_title') }}</strong>
        <div class="content">
            <form action="#" @submit.prevent="buyerRegister" autocomplete="off">
                <ul class="form-list">
                    <li>
                        <label for="fullname">
                            {{ $t('form.full_name') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" v-model="formData.full_name" required :title="$t('form.full_name')" class="input-text required-entry" id="fullname"  :placeholder="$t('form.full_name')" />
                    </li>
                    <li>
                        <label for="phone">
                            {{ $t('form.phone_no') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="number" v-model="formData.phone_no" required :title="$t('form.phone_no')" class="input-text required-entry" id="phone"  :placeholder="$t('form.phone_no')" />
                    </li>
                    <li>
                        <label for="email">
                            {{ $t('form.email') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="email" v-model="formData.email" required :title="$t('form.email')" class="input-text required-entry" id="email" :placeholder="$t('form.email')" />
                    </li>
                    <!--<li>
                        <label for="username">
                            User Name
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" title="User Name" v-model="formData.user_name" required class="input-text required-entry" id="username"  placeholder="User Name" />
                    </li>-->
                    <li>
                        <label for="reg_pass">
                            {{ $t('form.password') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" minlength="8" v-model="formData.password" required :title="$t('form.password')" id="reg_pass" class="input-text required-entry validate-password"  :placeholder="$t('form.password')" />
                    </li>
                    <li>
                        <label for="conf_pass">
                            {{ $t('form.confirm_pass') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" minlength="8" v-model="formData.password_confirmation" :title="$t('form.confirm_pass')" id="conf_pass" class="input-text required-entry validate-password" :placeholder="$t('form.confirm_pass')" />
                    </li>
                </ul>
                <div class="buttons-set">
                    <button class="button create-account" type="submit">
                        <span>{{ $t('auth.buyer.reg_title') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "BuyerRegisterPage",
        data(){
            return{
                formData:{
                    full_name:'',
                    phone_no:'',
                    email:'',
                    // user_name:'',
                    password:'',
                    password_confirmation:'',
                }
            }
        },
        methods:{
            ...mapActions([
                'registerBuyer'
            ]),
            buyerRegister(){

                this.registerBuyer(this.formData)
                    .then(response=>{
                        if(typeof  response.code === "undefined"){
                            this.$noty.error('Some Thing Wrong');
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else if (response.code === 200){
                            this.$noty.success(response.message);
                            setTimeout(function () {
                                location.href = response.url;
                            },800)
                        }else{
                            this.$noty.error(response.message);
                        }
                    })

            }
        }
    }
</script>

<style scoped>

</style>
