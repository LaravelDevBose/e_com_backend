<template>
    <div class="box-authentication">
        <h3>{{ $t('auth.buyer.reg_title') }}</h3>
        <p>{{ $t('auth.buyer.reg_sub_title') }}</p>
        <form action="" @submit.prevent="sellerRegister">
            <div class="row">
                <div class="col-md-10">
                    <label for="shop_name">{{ $t('form.shop_name') }}<span class="text text-danger text-bold">*</span></label>
                    <input type="text" v-model="formData.shop_name" :placeholder="$t('form.shop_name')" required class="form-control" id="shop_name">
                </div>
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
                    <button type="submit" class="button"><i class="fa fa-user"></i> {{ $t('auth.seller.create_shop') }}</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "RegisterPage",
        data(){
            return{
                formData:{
                    shop_name:'',
                    full_name:'',
                    phone_no:'',
                    email:'',
                    user_name:'',
                    password:'',
                    password_confirmation:'',
                }
            }
        },
        methods:{
            ...mapActions([
                'registerSeller'
            ]),
            sellerRegister(){

                this.registerSeller(this.formData)
                    .then(response=>{
                        console.log(response);
                        if(typeof  response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                            setTimeout(function () {
                                location.href = response.url;
                            },800)
                        }else if(response.status === 'validation'){
                            this.$noty.error(response.message);
                        }else{
                            this.$noty.error(response.message);
                            // setTimeout(function () {
                            //     location.reload();
                            // },800);
                        }
                    })

            }
        }
    }
</script>

<style scoped>

</style>
