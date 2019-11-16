<template>
    <div class="products  products-grid">
        <ol v-if="productList" class="product-items row">
            <li class="col-sm-3" v-for="(product,index) in productList" :key="index">
                <div class="product-item  product-item-opt-1">
                    <product-grid  :product="product"></product-grid>
                </div>
            </li>
        </ol><!-- list product -->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ProductsPage",
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
            /*reqDataCheck:{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.getCategoryWishProducts(this.reqData);
                    }
                },
                deep:true,
            },*/
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
