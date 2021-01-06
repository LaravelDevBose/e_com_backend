<template>
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home    </a></li>
                <li class="active"> Checkout</li>-->
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2"> Reset Password</span>
            </h2>

            <div class="page-content checkout-page">
                <div class="box-border">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="" @submit.prevent="submit()">
                                <h4>Reset Password</h4>
                                <p>Enter your email address and your new password:</p>
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>Email address<span class="text text-danger">*</span></label>
                                        <input class="form-control input" type="email" required v-model="reqData.email">
                                    </div>
                                    <div class="col-md-10">
                                        <label>New Password<span class="text text-danger">*</span></label>
                                        <input class="form-control input" type="password" required v-model="reqData.password">
                                    </div>
                                    <div class="col-md-10">
                                        <label>Confirm Password<span class="text text-danger">*</span></label>
                                        <input class="form-control input" type="password" required v-model="reqData.password_confirmation">
                                    </div>
                                    <div class="col-md-10">
                                        <p> <router-link :to="{name:'password_reset_email'}">Send forgot password mail?</router-link> </p>
                                        <button type="submit" :disabled="btnDisabled" class="button text-right"><i class="fa fa-lock"></i> Reset Password</button>
                                        <div class="alert alert-info" style="margin-top: .5rem;" v-if="loading">
                                            <i class="fas fa-spinner fa-pulse"></i> Updating Password. Please Wait....
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>
</template>

<script>
import {mapActions} from 'vuex';
export default {
    name: "PasswordResetPage",
    data(){
        return{
            reqData:{
                token:'',
                email:'',
                password: '',
                password_confirmation: '',
            },
            btnDisabled: false,
            loading: false,
        }
    },
    beforeRouteEnter(to, form, next){
        let token ='';
        let email = '';
        if (to.params.hasOwnProperty('token')) {
            token = to.params.token;
        }
        if (to.query.hasOwnProperty('email')){
            email = to.query.email;
        }
        next(vm => {
            if (token){
                vm.reqData.token = token;
                vm.reqData.email = email;
            }else{
                vm.$router.push('/page_not_found');
            }

        });
    },
    methods:{
        ...mapActions(['resetPasswordSubmit']),
        submit(){
            this.btnDisable = true;
            this.resetPasswordSubmit(this.reqData)
            .then(response=>{
                this.btnDisable = false;
                if(typeof response.status !== "undefined" && response.status === 200){
                    this.$router.push({name:'auth'});
                }
            })
        }
    },
    watch:{
        reqData:{
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    this.btnDisable = false;
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
