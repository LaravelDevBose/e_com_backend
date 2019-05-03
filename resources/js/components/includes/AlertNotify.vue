<template>
    <div class="row" v-if="getResponse">
        <div class="col-md-12">
            <div class="alert bg-success" v-if="getResponse.status === 'success'">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">Success! </span> <span v-html="getResponse.msg"></span>
            </div>

            <div class="alert bg-primary" v-if="getResponse.status === 'info'">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">Info! </span> <span v-html="getResponse.msg"></span>
            </div>

            <div class="alert bg-danger" v-if="getResponse.status === 'error'">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">Error! </span><span v-html="getResponse.msg"></span>
            </div>

            <div class="alert bg-warning" v-if="getResponse.status === 'warning'">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">Warning! </span><span v-html="getResponse.msg"></span>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        name: "AlertNotify",
        computed:{
            ...mapGetters([
                'showAlert',
                'getResponse',
            ]),

        }
    }
</script>

<style scoped>

</style>
