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
                                <p>Enter your email address for reset your password:</p>

                                <label>Email address<span class="text text-danger">*</span></label>
                                <input class="form-control input" type="text" required v-model="reqData.email">
                                <br>
                                <button class="submit" :disabled="btnDisable">Send Password Reset Link</button>
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
    name: "PasswordResetEmailPage",
    data(){
        return{
            reqData:{
                email:''
            },
            btnDisable:false
        }
    },
    methods:{
        ...mapActions(['sendResetPasswordEmail']),
        submit(){
            this.btnDisable = true;
            this.sendResetPasswordEmail(this.reqData)
                .then(response=>{
                    this.btnDisable = false;
                });
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
