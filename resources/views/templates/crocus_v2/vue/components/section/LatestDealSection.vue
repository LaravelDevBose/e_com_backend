<template>
    <div class="bestsell-pro" v-if="showLatestDeal">
        <div class="slider-items-products">
            <div class="bestsell-block">
                <div class="block-title">
                    <h2>Latest Deals</h2>
                    <div class="countdown">
                        <div class="block">
                            <p class="digit">{{ days | two_digits }}</p>
                            <p class="text">D</p>
                        </div>
                        <div class="block">
                            <p class="digit">{{ hours | two_digits }}</p>
                            <p class="text">H</p>
                        </div>
                        <div class="block">
                            <p class="digit">{{ minutes | two_digits }}</p>
                            <p class="text">M</p>
                        </div>
                        <div class="block">
                            <p class="digit">{{ seconds | two_digits }}</p>
                            <p class="text">S</p>
                        </div>
                    </div>
                </div>

                <div id="bestsell-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid block-content">
                        <template v-for="(dealProduct, index) in latest_deal.deal_products" >
                            <product-grid
                                v-if="dealProduct.product"
                                :product="dealProduct.product"></product-grid>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductGrid from "../product/ProductGrid";
    import FlipCountdown from "vue2-flip-countdown";
    export default {
        name: "LatestDealSection",
        props: ['latest_deal'],
        components: {
            'product-grid': ProductGrid,
            FlipCountdown
        },

        data() {
            return {
                now: Math.trunc((new Date()).getTime() / 1000)
            }
        },
        mounted() {
            window.setInterval(() => {
                this.now = Math.trunc((new Date()).getTime() / 1000);
            },1000);
        },
        computed: {
            dateInMilliseconds() {
                return Math.trunc(Date.parse(this.latest_deal.end_time) / 1000)
            },
            seconds() {
                return (this.dateInMilliseconds - this.now) % 60;
            },
            minutes() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60) % 60;
            },
            hours() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60) % 24;
            },
            days() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60 / 24);
            },
            showLatestDeal(){
                return (this.dateInMilliseconds - this.now > 0);
            }
        },
    }
</script>

<style scoped>
    .bestsell-pro .block-title {
        height: auto!important;
    }
    .countdown {
        display: inline-block;
        padding-left: 10px;
        padding-top: 3px;
        line-height: 20px;
        margin-right: 50px;
    }

    .countdown .block {
        display: inline-block;
        margin: 0px;
        background: #e25b60;
        height: 30px;
        text-align: center;
        padding: 3px;
    }

    .countdown .text {
        color: #cdd1d4;
        font-size: 11px;
        margin: 0px;
        display: inline-block;
        line-height: 11px;
    }

    .countdown .digit {
        color: #ffffff;
        font-size: 18px;
        font-weight: bold;
        display: inline-block;
        margin: 0;
        line-height: 17px;
    }
</style>
