<template>
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-body ">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <form action="#" method="POST" id="admin_login" @submit.prevent="checkLoginData" class="form-validate">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                            <AlertNotify/>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Username Or Email" v-model="form.identity">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>

                            </div>
                            <p class="text-danger">{{ identError }}</p>

                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" v-model="form.password"  >
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <p class="text-danger">{{ pass_error }}</p>
                        </div>

                        <div class="form-group">
                            <button type="submit" :disabled="disabled" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AlertNotify from '../includes/AlertNotify'
    import {mapGetters, mapActions} from  'vuex'
    export default {
        name: "AdminLogin",
        components:{
            AlertNotify
        },
        data(){
            return {
                disabled:false,
                form:{
                    identity:'',
                    password:'',
                },
                identError:'',
                pass_error:'',
                res:{},

            }
        },
        methods:{

            ...mapActions([
                'login',
            ]),
            checkLoginData:function(){
                this.identError =''
                this.pass_error =''

                if(this.form.identity === ''){
                    this.identError = 'Enter Your Username Or Email';
                    return false;
                }

                if(this.form.password === ''){
                    this.pass_error = 'Enter Your Password Min: 6';
                    return false;
                }

                if(this.form.password.length < 6){
                    this.pass_error = 'Min 6 Character of Password';
                    return false;
                }
                this.disabled = true;
                this.login(this.form)

            },
        },
        computed:{
            getResponse:()=>{
                 this.res = this.$store.getters.getResponse;
            }
        },
        watch:{
            form:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.disabled = false;
                    }
                },
                deep:true,
            },
            res:{
                handler(newValue){
                    if(newValue.status == 'success' && newValue.route !==0){
                        window.location = newValue.route;
                    }
                }
            }
        }


    }
</script>

<style scoped>

</style>
