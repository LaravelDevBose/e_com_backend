<template>
    <main class="site-main">

        <div class="columns container" style="margin-top: 2rem">
            <!-- Block  Breadcrumb-->
            <h2 class="page-heading">
                <span class="page-heading-title2">Reset Your Password</span>
            </h2>

            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="box-authentication">
                            <form method="POST" @submit.prevent="sentResetLink" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="emmail_login">Email <span class="text text-danger text-bold">*</span></label>
                                        <input type="email" v-model="formData.email" name="email" autocomplete="off" placeholder="email" required class="form-control" id="emmail_login">
                                    </div>
                                    <div class="col-md-10">
                                        <button type="submit" class="button text-right"><i class="fa fa-lock"></i> Send Password Reset Link</button>
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
        name: "ForgetPasswordPage",
        data(){
            return{
                formData:{
                    email:''
                }
            }
        },
        methods:{
            ...mapActions([
                'sendPasswordResetLink'
            ]),
            sentResetLink(){
                this.sendPasswordResetLink(this.formData)
                .then(response=>{
                    if(typeof response.code !== "undefined" && response.code === 200){
                        this.$noty.success(response.message);
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
