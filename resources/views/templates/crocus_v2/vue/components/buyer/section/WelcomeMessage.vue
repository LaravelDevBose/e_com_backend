<template>
    <div class="welcome-msg">
        <strong>Hello, {{ buyer_name }}!</strong>
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
