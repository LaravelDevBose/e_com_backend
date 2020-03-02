<template>
    <ul class="icons-list">
        <li><a href="#" class="text text-primary-700" @click.prevent="goToDetailsPage(row.product_slug)"><i class="icon-eye"></i></a></li>
        <li><a href="#" class="text text-info" @click.prevent="goToEditPage(row.product_slug)"><i class="icon-pencil7"></i></a></li>
        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.product_id)"><i class="icon-trash"></i></a></li>
    </ul>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "SellerProductAction",
        props: ['row'],
        methods: {
            ...mapActions([
                'deleteProductData'
            ]),
            goToDetailsPage: function(slug){
                window.location = '/seller/product/'+slug;
            },
            goToEditPage:function (slug) {
                window.location = '/seller/product/'+slug+'/edit';
            },
            showDeletePopUp:function (ID) {
                let conf = confirm('Are You Sure. Want To delete.?');

                if(!conf){
                    return false;
                }
                this.deleteProductData(ID)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            location.reload();
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
    }
</script>

<style scoped>

</style>
