<template>
    <form action="" @submit.prevent="registerNewUser()">
        <h4>Register</h4>
        <p>Register with us for future convenience:</p>

        <label>Full Name<span class="text text-danger">*</span></label>
        <input class="form-control input" type="text" required v-model="reqData.name">

        <label>Email address<span class="text text-danger">*</span></label>
        <input class="form-control input" type="text" required v-model="reqData.email">

        <label>Phone No<span class="text text-danger">*</span></label>
        <input class="form-control input" type="text" required v-model="reqData.phone">

        <label>Password<span class="text text-danger">*</span></label>
        <input class="form-control input" type="password" required min="8" v-model="reqData.password">

        <label>Confirm Password<span class="text text-danger">*</span></label>
        <input class="form-control input" type="password" required min="8" v-model="reqData.password_confirmation">

<!--        <p><a href="#">Already have Account ?</a></p>-->
        <button type="submit" class="button" :disabled="btnDisable">Register</button>
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
            btnDisable: false,
        }
    },
    methods:{
        ...mapActions(['register']),
        registerNewUser(){
            this.btnDisable = true;
            this.register(this.reqData)
                .then(response=>{
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
                    this.btnDisable = false;
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
