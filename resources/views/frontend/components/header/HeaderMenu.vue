<template>
    <div class="box-header-nav">

        <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat">
            <span>Categories</span>
            <i aria-hidden="true" class="fa fa-bars"></i>
        </span>

        <!-- categori -->
        <div class="block-nav-categori">

            <div class="block-title">
                <span>Categories</span>
            </div>

            <div class="block-content">
                <div class="clearfix"><span data-action="close-cat" class="close-cate"><span>Categories</span></span>
                </div>
                <header-category-menu></header-category-menu>

                <div class="view-all-categori">
                    <router-link :to="{name: 'all_category'}" class="btn-view-all">
                        All Categories
                    </router-link>
                </div>
            </div>

        </div><!-- categori -->

        <!-- menu -->
        <div class="block-nav-menu">
            <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>close</span></span></div>
            <mega-menu-section></mega-menu-section>

        </div><!-- menu -->

        <span data-action="toggle-nav" class="nav-toggle-menu">
            <span>Menu</span>
            <i aria-hidden="true" class="fa fa-bars"></i>
        </span>

        <div class="block-minicart dropdown ">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="cart-icon"></span>
            </a>
            <header-cart-dropdown></header-cart-dropdown>
        </div>

        <div class="block-search">
            <div class="block-title">
                <span>Search</span>
            </div>
            <mini-search-section></mini-search-section>
        </div>
    </div>
</template>

<script>
import HeaderCategoryMenu from "./HeaderCategoryMenu";
import HeaderCartDropdown from "./cart/HeaderCartDropdown";
import MegaMenuSection from "./megamenu/MegaMenuSection";
import MiniSearchSection from "./search/MiniSearchSection";

export default {
    name: "HeaderMenu",
    components: {MiniSearchSection, MegaMenuSection, HeaderCartDropdown, HeaderCategoryMenu},
    mounted() {
        let externalScript = document.createElement('script')
        externalScript.setAttribute('src', this.$baseUrl+'/frontend/js/main.js');
        document.getElementById('mainjs').appendChild(externalScript)
    }
}
</script>

<style scoped>

</style>
