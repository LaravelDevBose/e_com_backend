<template>
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

                        <!--<div class="form-group">
                            <label>User Name: <span class="text-danger text-bold">*</span></label>
                            <input type="text" v-model="formData.user_name" class="form-control" placeholder="user Name" required>
                        </div>-->

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
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';

    export default {
        name: "OtherChangeSection",
        data(){
            return{
                formData:{
                    full_name:'',
                    // user_name:'',
                    email:'',
                    phone_no:'',
                },
                btnDisabled:false,
            }
        },
        mounted(){
            this.getAccountInfo();
        },
        methods:{
            ...mapActions([
                'updateAccountInfo',
                'getAccountInfo',
            ]),
            updateAccountSetting(){
                this.btnDisabled = true;

                this.updateAccountInfo(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            this.btnDisabled = false;
                            if(response.url !== null){
                                setTimeout(()=>{
                                    window.location.href = response.url;
                                },1000);
                            }
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'accountInfo',
            ]),

            fromCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
            accountInfoCheck(){
                return JSON.parse(JSON.stringify(this.accountInfo));
            }
        },
        watch:{
            fromCheck:{
                handler(newValue,oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                }
            },
            accountInfoCheck:{
                handler(newValue,oldValue){
                    if(oldValue !== newValue){
                        Object.assign(this.formData, this.accountInfo);
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
