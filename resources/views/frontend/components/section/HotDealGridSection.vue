<template>
    <div class="block-hot-deals-opt3">
        <div class="container">

            <div class="box-content">

                <div class="block-title">
                    <span class="title"><span>H<br>o<br>t</span><span>d<br>e<br>a<br>l<br>s</span></span>

                    <div class="nav-links dropdown">
                        <button class="dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" >
                            <ul  >
                                <li><a href="#">up to 40% off</a></li>
                                <li><a href="#">up to 40% off</a></li>
                                <li><a href="#">up to 50% off</a></li>
                                <li><a href="#">up to 60% off</a></li>
                                <li><a href="#">up to 70% off</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="block-content ">
                    <div class="owl-carousel"
                         data-nav="true"
                         data-dots="false"
                         data-margin="30"
                         data-responsive='{
                                        "0":{"items":1},
                                        "480":{"items":2},
                                        "480":{"items":2},
                                        "768":{"items":3},
                                        "992":{"items":3},
                                        "1200":{"items":4}
                                    }'>

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
name: "HotDealGridSection",
    components: {ProductItem}
}
</script>

<style scoped>

</style>
