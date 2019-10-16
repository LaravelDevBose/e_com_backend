<template>
    <div class="bestsell-pro" v-if="section">
        <div class="slider-items-products">
            <div class="bestsell-block">
                <div class="block-title">
                    <h2>{{ section.section_title }}</h2>
                </div>
                <div id="bestsell-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid block-content">
                        <product-grid v-if="products" v-for="(product,index) in products" :key="index" :product="product"></product-grid>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ProductGrid from "../product/ProductGrid";
    export default {
        name: "CarouselProductSection",
        components: {ProductGrid},
        props:{
            section:[Object]
        },
        data(){
            return{
                products:[],
            }
        },
        mounted() {
            this.getSectionProducts(this.section.section_id)
                .then(response=>{
                    if(typeof response.code !== "undefined" && response.code === 200){
                        this.products = response.data;
                    }else{
                        console.log(response);
                    }
                })
        },
        methods:{
            ...mapActions([
                'getSectionProducts'
            ])
        }
    }
</script>

<style scoped>

</style>
