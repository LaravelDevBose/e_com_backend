<template>
    <div id="homepageSection" v-infinite-scroll="loadHomepageSection" infinite-scroll-disabled="busy" infinite-scroll-distance="limit">
        <div v-if="sectionList" >
            <div v-for="section in sectionList">
                <tabbed-product-section v-if="section.section_type == 1" :section="section"></tabbed-product-section>
                <carousel-product-section v-if="section.section_type == 2" :section="section"></carousel-product-section>
                <grid-product-section v-if="section.section_type == 3" :section="section"></grid-product-section>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import TabbedProductSection from "../section/TabbedProductSection";
    import CarouselProductSection from "../section/CarosulProductSection";
    import GridProductSection from "../section/GridProductSection";
    import infiniteScroll from 'vue-infinite-scroll';

    export default {
        name: "HomepageSection",
        components: {TabbedProductSection,CarouselProductSection, GridProductSection},
        directives: {infiniteScroll},
        data(){
            return{
                loading: false,
                limit: 2,
                busy: false,
                posts:[],
                reqUrl:'/section/list',
            }
        },
        created() {

        },
        mounted(){
            this.loadHomepageSection();
        },
        methods:{
            ...mapActions([
                'getHomePageSections'
            ]),
            loadHomepageSection(){
                console.log('sss');
                this.busy = true;
                this.getHomePageSections(this.reqUrl)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.busy=false;
                        }
                    });
            }
        },
        computed:{
            ...mapGetters([
                'sectionList',
                'sectionPagination',
            ]),
            checkPaginationData(){
                return JSON.parse(JSON.stringify(this.sectionPagination));
            },
        },
        watch:{
            checkPaginationData:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.reqUrl = this.sectionPagination.next_page_url;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
