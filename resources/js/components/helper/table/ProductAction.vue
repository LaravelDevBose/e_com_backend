<template>
    <ul class="icons-list">
        <li><a href="#" class="text text-primary-700" @click.prevent="goToDetailsPage(row.product_slug)"><i class="icon-eye"></i></a></li>
        <li><a href="#" class="text text-info" @click.prevent="goToEditPage(row.product_slug)"><i class="icon-pencil7"></i></a></li>
        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.id)"><i class="icon-trash"></i></a></li>
    </ul>
</template>

<script>
    import {mapActions} from 'vuex';
    export default {
        name: "ProductAction",
        props: ['row'],
        methods: {
            ...mapActions([
                'deleteProductData'
            ]),
            goToDetailsPage: function(slug){
                window.location = '/admin/product/'+slug;
            },
            goToEditPage:function (slug) {
                window.location = '/admin/product/'+slug+'/edit';
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
