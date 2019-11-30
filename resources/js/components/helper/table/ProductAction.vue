<template>
    <ul class="icons-list">
        <li><a href="#" class="text text-primary-700" @click.prevent="goToDetailsPage(row.product_slug)"><i class="icon-eye"></i></a></li>
        <li><a href="#" class="text text-info" @click.prevent="goToEditPage(row.product_slug)"><i class="icon-pencil7"></i></a></li>
        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.product_slug)"><i class="icon-trash"></i></a></li>
    </ul>
</template>

<script>
    export default {
        name: "ProductAction",
        props: ['row'],
        methods: {
            goToDetailsPage: function(slug){
                window.location = '/admin/product/'+slug;
            },
            goToEditPage:function (slug) {
                window.location = '/admin/product/'+slug+'/edit';
            },
            showDeletePopUp:function (ID) {

            }
        },
    }
</script>

<style scoped>

</style>
