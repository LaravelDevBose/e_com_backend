<template>
    <div class="block-floor-products block-floor-products-opt3 floor-products1" >
        <div class="container">
            <!-- title -->
            <div class="block-title ">
                <span class="title">NEW ARRIVALS IN</span>
            </div>

            <div class="block-content">
                <!-- banner -->
                <div class="col-banner">
                    <a href="" class="box-img">
                        <img src="images/media/index3/baner-floor1.jpg" alt="baner-floor">
                        <div class="des"><span>up to 30% off</span></div>
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
name: "NewArrivalSection",
    components: {ProductItem}
}
</script>

<style scoped>

</style>
