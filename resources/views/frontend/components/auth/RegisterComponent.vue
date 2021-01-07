<template>
    <form action="" @submit.prevent="registerNewUser()">
        <h4>Register</h4>
        <p>Register with us for future convenience:</p>
        <div class="row">
            <div class="col-md-10">
                <label>Full Name<span class="text text-danger">*</span></label>
                <input class="form-control input" type="text" required v-model="reqData.name">
            </div>
            <div class="col-md-10">
                <label>Email address<span class="text text-danger">*</span></label>
                <input class="form-control input" type="text" required v-model="reqData.email">
            </div>
            <div class="col-md-10">
                <label>Phone No<span class="text text-danger">*</span></label>
                <input class="form-control input" type="text" required v-model="reqData.phone">
            </div>

            <div class="col-md-10">
                <label>Password<span class="text text-danger">*</span></label>
                <input class="form-control input" type="password" required min="8" v-model="reqData.password">
            </div>

            <div class="col-md-10">
                <label>Confirm Password<span class="text text-danger">*</span></label>
                <input class="form-control input" type="password" required min="8" v-model="reqData.password_confirmation">
            </div>
            <div class="col-md-10">
                <button type="submit" class="button" :disabled="btnDisabled">Register</button>
                <div class="alert alert-info" style="margin-top: .5rem;" v-if="loading">
                    <i class="fas fa-spinner fa-pulse"></i> Updating Password. Please Wait....
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name: "RegisterComponent",
    data(){
        return{
            reqData:{
                name: '',
                email: '',
                phone: '',
                password: '',
                password_confirmation: ''
            },
            btnDisabled: false,
            loading: false,
        }
    },
    methods:{
        ...mapActions(['register']),
        registerNewUser(){
            this.btnDisabled = true;
            this.loading = true;
            this.register(this.reqData)
                .then(response=>{
                    this.loading = false;
                    if(typeof response.status !== "undefined" && response.status === 200){
                        if (this.cartTotal && this.cartTotal > 0){
                            this.$router.push('/checkout');
                        }else{
                            this.$router.push({name: 'dashboard'});
                        }

                    }
                });
        }
    },
    computed:{
        ...mapGetters(['cartTotal']),
        checkFormData(){
            return JSON.parse(JSON.stringify(this.reqData));
        }
    },
    watch:{
        checkFormData:{
            handler(newValue, oldValue){
                if (newValue !== oldValue){
                    this.btnDisabled = false;
                }
            }, deep: true,
        }
    }
}
</script>

<style scoped>
.button:disabled,
.button:disabled:hover{
    background: #adadad;
    border: 1px solid #eaeaea;
}
</style>
