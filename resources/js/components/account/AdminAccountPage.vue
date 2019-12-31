<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Admin Account</h5>
                <div class="heading-elements">
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="manipulateAdminData">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group">
                                <label>Admin Name:</label>
                                <input type="text" v-model="formData.full_name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <label>User Name:</label>
                                <input type="text" v-model="formData.user_name" class="form-control" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" v-model="formData.email" class="form-control" placeholder="Email" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <!--<div class="form-group">
                                <label>Role:</label>
                                <select name="admin_role" v-model="formData.admin_role"  class="form-control" required>
                                    <option value="">Select A Role</option>
                                    <option value=""></option>
                                </select>
                            </div>-->
                            <div class="form-group">
                                <label>Phone No.:</label>
                                <input type="text" v-model="formData.phone_no" class="form-control" placeholder="Phone No" required>
                            </div>
                            <div v-if="!is_edit">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" v-model="formData.password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input type="password" v-model="formData.password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-style" for="admin_status">
                                    <span class="text-bold text-success" v-if="formData.admin_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Block</span>
                                    <input type="checkbox" id="admin_status" v-model="formData.admin_status"  :checked="formData.admin_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success">
                                    <span v-if="is_edit">Update Brand</span>
                                    <span v-else>Save Brand</span>
                                    <i class="icon-arrow-right14 position-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Admin List</h5>

            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="adminList" v-for="(admin , index) in adminList" :key="admin.id">
                        <td>{{ index +1 }}</td>
                        <td>
                            <span class="text text-bold"> {{ admin.fullName }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ admin.userName }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ admin.email }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ admin.phoneNo }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="admin.role === 1">{{ admin.role_label }}</span>
                            <span class="badge badge-primary" v-else>{{ admin.role_label }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="admin.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>Block</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#" @click.prevent="editAdmin(admin.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="adminDelete(admin.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    export default {
        name: "AdminAccountPage",
        data(){
            return{
                formData:{
                    id:'',
                    full_name:'',
                    user_name:'',
                    email:'',
                    phone_no:'',
                    admin_role:2,
                    admin_status:false,
                    password:'',
                    password_confirmation:'',
                },
                btnDisabled:false,
                is_edit:false,
                roles:[
                    { value:1, text:'Super Admin'},
                    { value:2, text:'Admin'},
                    { value:3, text:'Manager'},
                ],
            }
        },
        mounted() {
            this.getAdminList();
        },
        methods:{
            ...mapActions([
                'getAdminList',
                'storeAdminInfo',
                'updateAdminInfo',
                'deleteAdminAccount'
            ]),
            manipulateAdminData(){
                if(this.is_edit){
                    this.updateAdminInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                Notify.success(response.message);
                                this.is_edit = false;
                                this.formReset();
                            }else if(response.status === "validation"){
                                Notify.validation(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                        .catch(error=>{
                            Notify.info(error.message);
                        })
                }else{
                    this.storeAdminInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                Notify.success(response.message);
                                this.formReset();
                            }else if(response.status === "validation"){
                                Notify.validation(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                        .catch(error=>{
                            Notify.info(error.message);
                        })
                }
            },
            formReset(){
                this.formData.id='';
                this.formData.full_name='';
                this.formData.user_name='';
                this.formData.email = '';
                this.formData.phone_no = '';
                this.formData.admin_role = '';
                this.formData.password = '';
                this.formData.password_confirmation = '';
                this.formData.admin_status=false;
            },
            editAdmin(adminId){
                this.is_edit = true;
                this.adminList.filter(admin=>{
                    if(admin.id === adminId){
                        this.formData.id=admin.id;
                        this.formData.full_name=admin.fullName;
                        this.formData.user_name=admin.userName;
                        this.formData.email = admin.email;
                        this.formData.phone_no = admin.phoneNo;
                        this.formData.admin_role = admin.role;
                        this.formData.admin_status=(admin.status === 1);
                    }
                })
            },
            adminDelete(adminId){
                let conf = confirm('Are You Sure. Want to Delete.?');

                if(!conf){
                    return false;
                }

                this.deleteAdminAccount(adminId)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
                    .catch(error=>{
                        Notify.info(error.message);
                    })
            }
        },
        computed:{
            ...mapGetters([
                'adminList',
            ]),
            checkFormData(){
                return JSON.parse(JSON.stringify(this.formData))
            }
        },
        watch:{
            checkFormData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
