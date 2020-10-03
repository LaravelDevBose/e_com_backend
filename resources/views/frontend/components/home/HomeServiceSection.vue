<template>
    <div class=" block-service-opt1">
        <div class="container">
            <div class="clearfix">
                <div class="col-md-3 col-sm-6">
                    <div class="item">
                                <span class="icon">
                                    <img :src="$baseUrl +'/images/service/shipping.png'" alt="Fast Delivery">
                                </span>
                        <strong class="title">Fastest Delivery </strong>
                        <span>with in only 3 days</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item">
                                <span class="icon">
                                    <img :src="$baseUrl +'/images/service/wallet.png'" alt="30-day return">
                                </span>
                        <strong class="title">30-day return</strong>
                        <span>Moneyback guarantee</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item">
                                <span class="icon">
                                    <img :src="$baseUrl +'/images/service/support.png'" alt="24/7 support">
                                </span>
                        <strong class="title">24/7 support</strong>
                        <span>Online consultations</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item">
                                <span class="icon">
                                    <img :src="$baseUrl +'/images/service/authentic.png'" alt="SAFE SHOPPING">
                                </span>
                        <strong class="title">SAFE SHOPPING </strong>
                        <span>Safe Shopping Guarantee</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "HomeServiceSection"
}
</script>

<style scoped>

</style>
