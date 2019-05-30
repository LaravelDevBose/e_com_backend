<template>
    
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name: "PNotify",
        computed:{
            ...mapGetters([
                'getResponse'
            ]),

        }
    }
</script>

<style scoped>

</style>
