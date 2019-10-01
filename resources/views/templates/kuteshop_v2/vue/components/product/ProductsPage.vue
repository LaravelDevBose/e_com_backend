<template>
    <div class="products  products-grid">
        <ol v-if="products" class="product-items row">
            <product-grid v-for="(product,index) in products" :product="product" :key="index"></product-grid>
        </ol><!-- list product -->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ProductsPage",
        props:{
            categoryid:[Number, String],
            slug:[String],
        },
        data(){
            return{
                reqData:{
                    category_id:'',
                    slug:'',
                }
            }
        },
        created(){
            this.reqData.category_id = this.categoryid;
            this.reqData.slug = this.slug;
        },
        mounted(){
            this.getCategoryWishProducts(this.reqData);
        },
        methods:{
            ...mapActions([
                'getCategoryWishProducts'
            ])
        },
        computed:{
            ...mapGetters([
                'products',
            ])
        }
    }
</script>

<style scoped>

</style>
