<template>
    <div class="category-products">
        <ul class="products-grid" v-if="productList">
            <li v-for="(product,index) in productList" class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <product-grid :product="product" :key="index"></product-grid>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ProductsPageList",
        props:{
            products:[Object,Array],
            categoryid:[Number, String],
            slug:[String],
        },
        data(){
            return{
                productList:[],
                reqData:{
                    category_id:'',
                    slug:'',
                }
            }
        },
        mounted(){
            this.reqData.category_id = this.categoryid;
            this.reqData.slug = this.slug;
        },
        methods:{
            ...mapActions([
                'getCategoryWishProducts'
            ])
        },
        computed:{
            ...mapGetters([
                'productsData',
            ]),
            reqDataCheck(){
                return JSON.parse(JSON.stringify(this.reqData));
            },
            productsUpdate(){
                return JSON.parse(JSON.stringify(this.productsData));
            }
        },
        watch:{
            productsUpdate:{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.productList = this.productsData;
                    }
                },deep:true,
            }
        }
    }
</script>

<style scoped>

</style>
