<template>
    <header class="site-header header-opt-3 cate-show" style="border-bottom: 3px solid #08c;">

        <header-top></header-top>

        <!-- header-content -->
        <div class="header-content">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 nav-left">
                        <!-- logo -->
                            <header-logo></header-logo>
                        <!-- logo -->
                    </div>

                    <div class="col-md-5 col-lg-6 nav-mind">

                        <!-- block search -->
                            <header-search-area></header-search-area>
                        <!-- block search -->

                    </div>

                    <div class="col-md-4 col-lg-3 nav-right">

                        <header-right-section></header-right-section>

                    </div>

                </div>

            </div>
        </div><!-- header-content -->

        <div class=" header-nav mid-header">
            <div class="container">
                <header-menu></header-menu>
            </div>
        </div>

    </header><!-- end HEADER -->
</template>

<script>
import HeaderTop from "./header/HeaderTop";
import HeaderLogo from "./header/HeaderLogo";
import HeaderSearchArea from "./header/HeaderSearchArea";
import HeaderRightSection from "./header/HeaderRightSection";
import HeaderMenu from "./header/HeaderMenu";

import {mapActions, mapGetters} from 'vuex';

export default {
    name: "PageHeader",
    components: {
        HeaderMenu,
        HeaderRightSection,
        HeaderSearchArea,
        HeaderLogo,
        HeaderTop
    },
    created() {
        this.getCategories();
    },
    methods:{
        ...mapActions([
            'getCategories'
        ]),
    },
    computed:{

    }
}
</script>

<style scoped>

</style>
