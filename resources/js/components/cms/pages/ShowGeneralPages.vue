<template>
    <h1>Single Page</h1>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "ShowGeneralPages",
        data(){
            return{

            }
        },
        created() {
            this.singleGeneralPageData();
        },
        computed:{
            ...mapActions([
                'singleGeneralPageData'
            ]),
            ...mapGetters([
                'pageData',
            ])
        }
    }
</script>

<style scoped>

</style>
