<template>
    <div class="box-authentication">
        <h3>{{ $t('auth.buyer.reg_title') }}</h3>
        <p>{{ $t('auth.buyer.reg_sub_title') }}</p>
        <form action="" @submit.prevent="buyerRegister">
            <div class="row">
                <div class="col-md-10">
                    <label for="full_name">{{ $t('form.full_name') }}<span class="text text-danger text-bold">*</span></label>
                    <input type="text" v-model="formData.full_name" :placeholder="$t('form.full_name')" required class="form-control" id="full_name">
                </div>
                <div class="col-md-10">
                    <label for="mobile">{{ $t('form.phone_no') }}</label>
                    <input type="text" v-model="formData.phone_no" :placeholder="$t('form.phone_no')" class="form-control" id="mobile">
                </div>
                <div class="col-md-10">
                    <label for="email">{{ $t('form.email') }} <span class="text text-danger text-bold">*</span></label>
                    <input type="email" v-model="formData.email" required placeholder="your@email.com" class="form-control" id="email">
                </div>
                <div class="col-md-10">
                    <label for="password">{{ $t('form.password') }} <span class="text text-danger text-bold">*</span></label>
                    <input type="password" v-model="formData.password" minlength="8" required :placeholder="$t('form.password')" class="form-control" id="password">
                </div>
                <div class="col-md-10">
                    <label for="password_con">{{ $t('form.confirm_pass') }} <span class="text text-danger text-bold">*</span></label>
                    <input type="password" v-model="formData.password_confirmation" minlength="8" required :placeholder="$t('form.confirm_pass')" class="form-control" id="password_con">
                </div>
                <div class="col-md-10">
                    <button type="submit" :disabled="btnDisabled" class="button"><i class="fa fa-user"></i> {{ $t('auth.buyer.reg_title') }}</button>
                    <div class="alert alert-info" style="margin-top: .5rem;" v-if="loading">
                        <i class="fas fa-spinner fa-pulse"></i> Loading ....
                    </div>
                </div>
            </div>
        </form>
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
                },
                btnDisabled: false,
                loading: false,
            }
        },
        methods:{
            ...mapActions([
                'registerBuyer'
            ]),
            buyerRegister(){
                this.loading = true;
                this.registerBuyer(this.formData)
                    .then(response=>{
                        this.loading = false;
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
