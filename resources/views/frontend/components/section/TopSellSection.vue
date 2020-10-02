<template>
    <div class="block-floor-products block-floor-products-opt3 floor-products2" >
        <div class="container">
            <!-- title -->
            <div class="block-title ">
                <span class="title">TOP SELL IN</span>
            </div>

            <div class="block-content">

                <!-- banner -->
                <div class="col-banner">
                    <a href="" class="box-img">
                        <img src="images/media/index3/baner-floor2.jpg" alt="baner-floor">
                        <div class="des"><span>TRENDING STYLE</span></div>
                    </a>
                </div>

                <!-- tab product -->
                <div class="col-products">
                    <div class="owl-carousel"
                         data-nav="true"
                         data-dots="false"
                         data-margin="8"
                         data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":3},
                                    "768":{"items":3},
                                    "992":{"items":3},
                                    "1200":{"items":4}
                                }'>
                        <div class=" product-item  product-item-opt-1 ">
                            <product-item></product-item>
                        </div>
                        <div class="product-item  product-item-opt-1 ">
                            <product-item></product-item>
                        </div>
                        <div class="product-item  product-item-opt-1 ">
                            <product-item></product-item>
                        </div>
                        <div class="product-item  product-item-opt-1 ">
                            <product-item></product-item>
                        </div>
                        <div class="product-item  product-item-opt-1 ">
                            <product-item></product-item>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import ProductItem from "../product/ProductItem";
export default {
name: "TopSellSection",
    components: {ProductItem}
}
</script>

<style scoped>

</style>
