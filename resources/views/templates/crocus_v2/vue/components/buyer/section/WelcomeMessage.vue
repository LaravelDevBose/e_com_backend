<template>
    <div class="welcome-msg">
        <strong>Hello, {{ buyer_name }}!</strong>
        <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
    </div>
</template>

<script>
    export default {
        name: "WelcomeMessage",
        data(){
            return{
                buyer_name:'',
            }
        },
        mounted() {
            this.buyer_name = AppStorage.getFullName();
        }
    }
</script>

<style scoped>

</style>
