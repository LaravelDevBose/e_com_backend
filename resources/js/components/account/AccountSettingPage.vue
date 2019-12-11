<template>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            Account Information Update
                        </h6>
                    </div>
                    <div class="panel-body">
                        <form action="" @submit.prevent="accountDetailsUpdate">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Full Name <span class="text-danger text-bold">*</span></label>
                                        <input type="text" v-model="accFormData.full_name" class="form-control" placeholder="Full Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>User Name: <span class="text-danger text-bold">*</span></label>
                                        <input type="text" v-model="accFormData.user_name" class="form-control" placeholder="user Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email: <span class="text-danger text-bold">*</span></label>
                                        <input type="email" v-model="accFormData.email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone No: <span class="text-danger text-bold">*</span></label>
                                        <input type="text" maxlength="11" v-model="accFormData.phone_no" class="form-control" placeholder="Phone No" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-6">
                                    <div class="text-right form-group">
                                        <button type="submit" :disabled="accBtnDisabled" class="btn btn-success">Update Setting<i class="icon-arrow-right14 position-right"></i></button>
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
                        <form action="" @submit.prevent="accountPasswordUpdate">
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
                                        <button type="submit" :disabled="passBtnDisabled" class="btn btn-success">Update Password<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    export default {
        name: "AccountSettingPage",
        props:{
            adminid:[Number],
        },
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
                accBtnDisabled:false,
                passBtnDisabled:false,
            }
        },
        created() {
            if(this.adminid !== ''){
                this.getAdminData(this.adminid);
            }
        },
        mounted() {

        },
        methods:{
            ...mapActions([
                'getAdminData',
                'updateAccountDetails',
                'updateAccountPassword',
            ]),
            accountDetailsUpdate(){
                this.updateAccountDetails(this.accFormData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    });
            },
            accountPasswordUpdate(){
                this.updateAccountPassword(this.passFormData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            this.passFormData.current_password='';
                            this.passFormData.password='';
                            this.passFormData.password_confirmation='';
                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    });
            }
        },
        computed:{
            ...mapGetters([
                'adminData',
            ]),
            checkAdminData(){
                return JSON.parse(JSON.stringify(this.adminData));
            },
            checkAccFormData(){
                return JSON.parse(JSON.stringify(this.accFormData));
            },
            checkPassFormData(){
                return JSON.parse(JSON.stringify(this.passFormData));
            }
        },
        watch:{
            checkAdminData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.accFormData.full_name = this.adminData.fullName;
                        this.accFormData.user_name = this.adminData.userName;
                        this.accFormData.email = this.adminData.email;
                        this.accFormData.phone_no = this.adminData.phoneNo;
                    }
                },
                deep:true,
            },
            checkAccFormData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.accBtnDisabled = false;
                    }
                },
                deep:true,
            },
            checkPassFormData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.passBtnDisabled = false;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
