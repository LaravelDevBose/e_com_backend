<template>
    <div>
        <!-- Block  bestseller products-->
        <div class="block-sidebar block-sidebar-categorie" v-if="categories && categories.length > 0">
            <div class="block-title">
                <strong>Categories</strong>
            </div>
            <div class="block-content">
                <ul class="items">
                    <li
                        v-for="category in categories"
                        :key="category.slug"
                        :class="{'parent': (category.children && category.children.length > 0)}"
                    >
                        <router-link :to="{name: 'Category Products', params:{category_slug: category.slug}}">
                            {{ category.name }}
                        </router-link>

                        <span v-if="category.children && category.children.length >0 " class="toggle-submenu"></span>
                        <ul v-if="category.children && category.children.length >0 " class="subcategory">
                            <li
                                v-for="subCategory in category.children"
                                :key="subCategory.slug"
                                :class="{'parent': (subCategory.children && subCategory.children.length > 0)}"
                            >
                                <router-link
                                    :to="{name: 'Category Products', params:{category_slug: subCategory.slug}}">
                                    {{ subCategory.name }}
                                </router-link>

                                <span v-if="subCategory.children && subCategory.children.length >0 "
                                      class="toggle-submenu"></span>
                                <ul v-if="subCategory.children && subCategory.children.length >0 " class="subcategory">
                                    <li
                                        v-for="child in subCategory.children"
                                        :key="child.slug"
                                    >
                                        <router-link
                                            :to="{name: 'Category Products', params:{category_slug: child.slug}}">
                                            {{ child.name }}
                                        </router-link>

                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- Block  bestseller products-->

        <!-- block filter products -->
        <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
            <div class="close-filter-products"><i class="fa fa-times" aria-hidden="true"></i></div>
            <div class="block-title">
                <strong>FILTER SELECTION</strong>
            </div>
            <div class="block-content">
                <!-- filter brad-->
                <div class="filter-options-item filter-options-brand" v-if="brandList && brandList.length > 0">
                    <div class="filter-options-title">BRAND</div>
                    <div class="filter-options-content">
                        <ol class="items">
                            <li class="item" v-for="brand in brandList" :key="brand.name">
                                <label>
                                    <input v-model="sorting_data.brand_ids" type="checkbox" :value="brand.id"><span>{{ brand.name }}</span>
                                </label>
                            </li>
                        </ol>
                    </div>
                </div><!-- Filter Item -->

                <!-- filter color-->
                <div class="filter-options-item filter-options-color" v-if="colorList && colorList.length > 0">
                    <div class="filter-options-title">COLOR</div>
                    <div class="filter-options-content">
                        <ol class="items">
                            <li class="item" v-for="color in colorList" :key="color.name">
                                <label :title="color.name">
                                    <input type="checkbox" v-model="sorting_data.color_ids" :value="color.id">
                                    <span>
                                        <span class="img" :style="{'background-color': color.code}"></span>
                                        <!--<span class="count">(30)</span>-->
                                    </span>
                                </label>
                            </li>
                        </ol>
                    </div>
                </div><!-- Filter Item -->

                <!-- Filter Item  size-->
                <div class="filter-options-item filter-options-size" v-if="sizeList && sizeList.length > 0">
                    <div class="filter-options-title">SIZE</div>
                    <div class="filter-options-content">
                        <ol class="items">
                            <li class="item" v-for="size in sizeList" :key="size.name">
                                <label>
                                    <input type="checkbox" v-model="sorting_data.size_ids" :value="size.id">
                                    <span>{{ size.name }}</span>
                                </label>
                            </li>
                        </ol>
                    </div>
                </div><!-- Filter Item  size-->

            </div>
        </div><!-- Filter -->

        <!-- Block  bestseller products-->
        <hot-deal-carousel-section></hot-deal-carousel-section>
        <!-- Block  bestseller products-->

        <!-- Block  tags-->
        <div class="block-sidebar block-sidebar-tags" v-if="tagList && tagList.length > 0">
            <div class="block-title">
                <strong>product tags</strong>
            </div>
            <div class="block-content">
                <ul>
                    <li v-for="tag in tagList" :key="tag.slug">
                        <router-link class="lv2" :to="{name: 'TagProducts', params:{tag_slug: tag.slug}}">
                            {{ tag.title }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div><!-- Block  tags-->



    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import HotDealCarouselSection from "../section/HotDealCarouselSection";

export default {
    name: "ProductsSidebarSection",
    components: {HotDealCarouselSection},
    data(){
        return{
            sorting_data:{
                brand_ids:[],
                color_ids:[],
                size_ids:[],
                price:{
                    min: 0,
                    max: 10000,
                },
            },
        }
    },
    methods: {
        ...mapActions([
            'getProductsSidebarData',
            'updateSortingData'
        ])
    },
    computed: {
        ...mapGetters([
            'categories',
            'slugsData',
            'colorList',
            'sizeList',
            'brandList',
            'tagList'
        ]),
        checkSlugsData(){
            return JSON.parse(JSON.stringify(this.slugsData));
        },
        checkSortingData(){
            return JSON.parse(JSON.stringify(this.sorting_data));
        },
    },
    watch: {
        checkSlugsData: {
            handler(newValue, oldValue){
                if (newValue !== oldValue){
                    this.getProductsSidebarData();
                }
            },
            deep: true,
        },
        checkSortingData: {
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    this.updateSortingData(this.sorting_data);
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
