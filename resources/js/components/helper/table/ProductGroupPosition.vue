<template>
    <div class="form-group" v-if="is_selected">
        <input type="number" class="form-control" v-model="formData.position">
    </div>
</template>

<script>
    export default {
        name: "ProductGroupPosition",
        props:['row'],
        data(){
            return{
                check:false,
                is_selected:false,
                formData:{
                    productId:'',
                    position:'',
                    type:'add',
                }
            }
        }
    }
</script>

<style scoped>

</style>
