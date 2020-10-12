<template>
    <form action="" @submit.prevent="loginSubmit()">
        <h4>Login</h4>
        <p>Already registered? Please log in below:</p>

        <label>Email address<span class="text text-danger">*</span></label>
        <input class="form-control input" type="text" required v-model="reqData.username">

        <label>Password<span class="text text-danger">*</span></label>
        <input class="form-control input" type="password" v-model="reqData.password">

        <p><a href="#">Forgot your password?</a></p>
        <button class="button">Login</button>
    </form>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    name: "LoginComponent",
    data(){
        return{
            reqData:{
                username: '',
                password: ''
            }
        }
    },
    methods:{
        ...mapActions(['login']),
        loginSubmit(){
            this.login(this.reqData)
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
        ...mapGetters(['cartTotal'])
    }
}
</script>

<style scoped>

</style>
