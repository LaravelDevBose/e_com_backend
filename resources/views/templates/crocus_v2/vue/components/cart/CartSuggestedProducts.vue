<template>
    <div class="category-products" v-if="sugProducts">
        <ul class="products-grid">
            <li v-for="(product,index) in sugProducts"  :key="index" class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                <product-grid :product="product"></product-grid>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import ProductGrid from "../product/ProductGrid";
    export default {
        name: "CartSuggestedProducts",
        components: {ProductGrid},
        data(){
            return{

            }
        },
        mounted() {
            this.getCartSuggestedProducts();
        },
        methods:{
            ...mapActions([
                'getCartSuggestedProducts',
            ])
        },
        computed:{
            ...mapGetters([
                'sugProducts',
            ])
        }
    }
</script>

<style scoped>

</style>
