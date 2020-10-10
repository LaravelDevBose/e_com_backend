<template>
    <!-- MAIN -->
    <main class="site-main">

        <div class="block-section-top block-section-top3" style="background-color: #ffcc33 ;">
            <div class="container">
                <div class="box-section-top">

                    <!-- categori -->
                    <div class="block-nav-categori">

                        <div class="block-title">
                            <span>Categories</span>
                        </div>

                        <div class="block-content">
                            <header-category-menu></header-category-menu>

                            <div class="view-all-categori">
                                <router-link :to="{name: 'all_category'}" class="btn-view-all">
                                    All Categories
                                </router-link>
                            </div>
                        </div>

                    </div><!-- categori -->

                    <!-- block slide top -->
                        <home-slider-section></home-slider-section>
                    <!-- block slide top -->

                    <!--Trending  -->
                        <home-trending-section></home-trending-section>
                    <!--Trending  -->

                </div>
            </div>
        </div>
        <!-- block  service-->
        <home-service-section></home-service-section>
        <!-- hot deals -->
        <hot-deal-grid-section></hot-deal-grid-section>
        <!-- hot deals -->
        <!-- block  service-->
        <div class="block" style="background-color: #EAEAEA;padding-top: 30px;padding-bottom:17px ;margin-bottom: 30px;">

            <!-- block -floor -products / floor 1 -->
            <new-arrival-section></new-arrival-section>
            <!-- block -floor -products / floor 1-->

            <!-- block -floor -products / floor 2 -->
            <trending-sell-section></trending-sell-section>
            <!-- block -floor -products / floor 2-->

            <!-- banner -->
            <div class="block-banner-lag-opt3  effect-banner3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <a class="box-img" href=""><img alt="banner" src="images/media/index3/banner1-1.jpg"></a>
                        </div>
                        <div class="col-sm-3">
                            <a class="box-img" href=""><img alt="banner" src="images/media/index3/banner1-2.jpg"></a>
                        </div>
                    </div>
                </div>
            </div><!-- banner -->

            <!-- block -floor -products / floor 4 -->
            <recommendation-section></recommendation-section>
            <!-- block -floor -products / floor 4-->
        </div>
        <!-- block  showcase-->
            <brand-section></brand-section>
        <!-- block  showcase-->
    </main><!-- end MAIN -->
</template>

<script>
import HeaderCategoryMenu from "../components/header/HeaderCategoryMenu";
import HomeSliderSection from "../components/home/HomeSliderSection";
import HomeTrendingSection from "../components/home/HomeTrendingSection";
import HomeServiceSection from "../components/home/HomeServiceSection";
import HotDealGridSection from "../components/section/HotDealGridSection";
import NewArrivalSection from "../components/section/NewArrivalSection";
import RecommendationSection from "../components/section/RecommendationSection";
import TrendingSellSection from "../components/section/TrendingSellSection";
import BrandSection from "../components/section/BrandSection";
export default {
    name: "HomePage",
    components: {
        BrandSection,
        TrendingSellSection,
        RecommendationSection,
        NewArrivalSection,
        HotDealGridSection,
        HomeServiceSection,
        HomeTrendingSection,
        HomeSliderSection,
        HeaderCategoryMenu
    }
}
</script>

<style scoped>

</style>
