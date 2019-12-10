<template>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        Account Information Update
                    </h6>
                </div>
                <div class="panel-body">
                    <form action="" @submit.prevent="updateAccountSetting">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label>Full Name <span class="text-danger text-bold">*</span></label>
                                    <input type="text" v-model="formData.full_name" class="form-control" placeholder="Full Name" required>
                                </div>

                                <div class="form-group">
                                    <label>User Name: <span class="text-danger text-bold">*</span></label>
                                    <input type="text" v-model="formData.user_name" class="form-control" placeholder="user Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Email: <span class="text-danger text-bold">*</span></label>
                                    <input type="email" v-model="formData.email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone No: <span class="text-danger text-bold">*</span></label>
                                    <input type="text" maxlength="11" v-model="formData.phone_no" class="form-control" placeholder="Phone No" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-6">
                                <div class="text-right form-group">
                                    <button type="submit" :disabled="btnDisabled" class="btn btn-success">Update Setting<i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
                                    <input type="password" minlength="8" v-model="passFormData.current_password" class="form-control" placeholder="Current Password" required>
                                </div>

                                <div class="form-group">
                                    <label>Password: <span class="text-danger text-bold">*</span></label>
                                    <input type="password" minlength="8" v-model="passFormData.password" class="form-control" placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password: <span class="text-danger text-bold">*</span></label>
                                    <input type="password" minlength="8" v-model="passFormData.password_confirmation" class="form-control" placeholder="Confirm Password" required>
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
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    export default {
        name: "AccountSettingPage",
        data(){
            return{
                accFormData:{
                    full_name:'',
                    user_name:'',
                    email:'',
                    phone_no:'',
                },
                passFormData:{
                    current_password:'',
                    password:'',
                    password_confirmation:''
                },
                btnDisabled:false,
            }
        },
        created() {

        },
        mounted() {

        },
        methods:{
            ...mapActions([

            ]),
            updateAccountSetting(){

            }
        },
        computed:{

        }
    }
</script>

<style scoped>

</style>
