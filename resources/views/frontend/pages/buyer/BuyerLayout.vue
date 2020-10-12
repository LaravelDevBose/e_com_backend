<template>
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home    </a></li>
                <li class="active">Your shopping cart</li>-->
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2">Welcome</span>
            </h2>

            <div class="page-content page-order">
                <div class="row">
                    <div class="col-md-3" >
                        <hot-deal-carousel-section></hot-deal-carousel-section>
                    </div>
                    <div class="col-md-9">
                        <keep-alive>
                            <router-view :key="$route.fullPath"></router-view>
                        </keep-alive>
                    </div>
                </div>

            </div>
            <br>
        </div>


    </main><!-- end MAIN -->
</template>

<script>
import HotDealCarouselSection from "../../components/section/HotDealCarouselSection";
export default {
name: "BuyerLayout",
    components: {HotDealCarouselSection}
}
</script>

<style scoped>

</style>
