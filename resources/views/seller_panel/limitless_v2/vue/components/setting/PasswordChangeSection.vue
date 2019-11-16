<template>
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">
                Password Change
            </h6>
        </div>
        <div class="panel-body">
            <form action="" @submit.prevent="changePassword">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label>Current Password:<span class="text-danger text-bold">*</span></label>
                            <input type="password" minlength="8" v-model="formData.current_password" class="form-control" placeholder="Current Password" required>
                        </div>

                        <div class="form-group">
                            <label>Password: <span class="text-danger text-bold">*</span></label>
                            <input type="password" minlength="8" v-model="formData.password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password: <span class="text-danger text-bold">*</span></label>
                            <input type="password" minlength="8" v-model="formData.password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-6">
                        <div class="text-right form-group">
                            <button type="submit" :disabled="btnDisabled" class="btn btn-success">Update Password<i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';
    export default {
        name: "PasswordChangeSection",
        data(){
            return{
                formData:{
                    current_password:'',
                    password:'',
                    password_confirmation:'',
                },
                btnDisabled:false,
            }
        },
        methods:{
            ...mapActions([
                'updatePassword',
            ]),
            changePassword(){
                this.btnDisabled = true;

                this.updatePassword(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            this.clearFrom();
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
            clearFrom(){
                this.formData.current_password='';
                this.formData.password='';
                this.formData.password_confirmation='';
                this.btnDisabled = false;
            }
        },
        computed:{
            fromCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            }
        },
        watch:{
            fromCheck:{
                handler(newValue,oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
