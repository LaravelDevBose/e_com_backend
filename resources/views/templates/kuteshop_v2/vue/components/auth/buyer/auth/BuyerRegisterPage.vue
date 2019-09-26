<template>
    <div class="box-authentication">
        <h3>Create an account</h3>
        <p>Please enter your email address to create an account.</p>
        <form action="" @submit.prevent="buyerRegister">
            <div class="row">
                <div class="col-md-10">
                    <label for="full_name">Full Name <span class="text text-danger text-bold">*</span></label>
                    <input type="text" v-model="formData.full_name" placeholder="Full name" required class="form-control" id="full_name">
                </div>
                <div class="col-md-10">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" v-model="formData.phone_no" placeholder="Phone no" class="form-control" id="mobile">
                </div>
                <div class="col-md-10">
                    <label for="email">Email <span class="text text-danger text-bold">*</span></label>
                    <input type="email" v-model="formData.email" required placeholder="your@email.com" class="form-control" id="email">
                </div>
                <div class="col-md-10">
                    <label for="password">Password <span class="text text-danger text-bold">*</span></label>
                    <input type="password" v-model="formData.password" minlength="8" required placeholder="Password" class="form-control" id="password">
                </div>
                <div class="col-md-10">
                    <label for="password_con">Confirm Password <span class="text text-danger text-bold">*</span></label>
                    <input type="password" v-model="formData.password_confirmation" minlength="8" required placeholder="Confirm Password" class="form-control" id="password_con">
                </div>
                <div class="col-md-10">
                    <button type="submit" class="button"><i class="fa fa-user"></i> Create an account</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "BuyerRegisterPage",
        data(){
            return{
                formData:{
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
                'registerBuyer'
            ]),
            buyerRegister(){

                this.registerBuyer(this.formData)
                    .then(response=>{
                        if(typeof  response.code === "undefined"){
                            this.$noty.error('Some Thing Wrong');
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else if (response.code === 200){
                            this.$noty.success(response.message);
                            setTimeout(function () {
                                location.href = response.url;
                            },800)
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
