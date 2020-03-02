<template>
    <img :src="image_path" :alt="row.product.product_title"  style="width:100%; max-height:40px">
</template>

<script>
    export default {
        name: "DealProductThumb",
        props: ['row'],
        data(){
            return{
                image_path:'',
            }
        },
        created() {
            if(this.row.product.hasOwnProperty('thumbnail')){
                this.image_path = this.row.product.thumbnail.image_path;
            }else if(this.row.product.hasOwnProperty('thumb_image')){
                this.image_path = this.row.product.thumb_image.image_path;
            }else{
                this.image_path = BASE_URL+'/assets/images/placeholder.jpg';
            }


            if(this.image_path === '' || this.image_path === false){
                this.image_path = BASE_URL+'/assets/images/placeholder.jpg';
            }
        }
    }
</script>

<style scoped>

</style>
