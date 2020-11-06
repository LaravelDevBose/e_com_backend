<template>
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home    </a></li>
                <li class="active">About Us</li>-->
            </ol><!-- Block  Breadcrumb-->

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3   col-main">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">{{ pageInfo.title }}</span>
                    </h2>

                    <div class="content-text clearfix">
                        <vue-editor id="body_content" :value="pageInfo.content" :disabled="true" :editor-toolbar="customToolbar"></vue-editor>
                    </div>

                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9   col-sidebar">
                    <div class="block-sidebar block-sidebar-categorie">
                        <div class="block-title">
                            <strong>Useful Links</strong>
                        </div>
                        <div class="block-content">
                            <ul class="items" v-if="pages && pages.length > 0">
                                <li v-for="page in pages" :key="page.slug">
                                    <router-link :to="{name: 'page', params:{slug: page.slug}}">
                                        {{ page.menuTitle }}
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hot-deal-carousel-section></hot-deal-carousel-section>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
    </main>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import { VueEditor } from "vue2-editor";
import HotDealCarouselSection from "../components/section/HotDealCarouselSection";
export default {
    name: "SupportPage",
    components:{HotDealCarouselSection, VueEditor},
    data() {
        return {
            customToolbar: [
                []
            ],
        }
    },
    beforeRouteEnter(to, from, next) {
        let slug = '';
        if (to.params.hasOwnProperty('slug')) {
            slug = to.params.slug;
        } else {
            vm.$router.push('/page_not_found');
        }

        next(vm => {
            vm.getPageDetails(slug)
                .then(response => {
                    if (response.status !== 200) {
                        vm.$router.push('/page_not_found');
                    }
                });
        });
    },
    beforeRouteUpdate(to, from, next) {
        let slug = '';
        if (to.params.hasOwnProperty('slug')) {
            slug = to.params.slug;
        } else {
            this.$router.push('/page_not_found');
        }

        this.getPageDetails(slug)
            .then(response => {
                if (response.status !== 200) {
                    this.$router.push('/page_not_found');
                }
            });
        next();
    },
    methods:{
        ...mapActions(['getPageDetails']),
    },
    computed:{
        ...mapGetters(['pages', 'pageInfo'])
    }
}
</script>

<style scoped>

</style>
