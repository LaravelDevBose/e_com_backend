<template>
    <div>
        <!-- Block  bestseller products-->
            <hot-deal-carousel-section></hot-deal-carousel-section>
        <!-- Block  bestseller products-->

        <!-- Block  bestseller products-->
            <owl-carousel-product-list title="Related Products" :products="relatedProducts"></owl-carousel-product-list>
        <!-- Block  bestseller products-->
    </div>
</template>

<script>
import HotDealCarouselSection from "../section/HotDealCarouselSection";
import OwlCarouselProductList from "../section/OwlCarouselProductList";
import {mapGetters} from 'vuex';
export default {
    name: "DetailsPageSidebar",
    components: {
        OwlCarouselProductList,
        HotDealCarouselSection
    },
    computed:{
        ...mapGetters(['relatedProducts'])
    }
}
</script>

<style scoped>

</style>
