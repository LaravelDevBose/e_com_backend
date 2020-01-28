<template>

    <!-- block filter products -->
    <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
        <div class="close-filter-products"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="block-content">
            <!-- filter price -->
            <div class="filter-options-item filter-options-price">
                <div class="filter-options-title" style="margin-bottom: 35px">{{ $t('products.price')}}</div>
                <div class="filter-options-content">
                    <div class="slider-range">
                        <vue-slider
                            v-model="sortData.range"
                            :enable-cross="false"
                            :min="search_min_price"
                            :max="search_max_price"
                            :dot-options="tooltipOptions"
                        ></vue-slider>
                    </div>
                </div>
            </div>
            <!-- filter price -->

            <!-- filter brad-->
            <div v-if="brands.length >0" class="filter-options-item filter-options-brand">
                <div class="filter-options-title">{{ $tc('products.brand',brands.length)}}</div>
                <div class="filter-options-content">
                    <ol class="items">
                        <li class="item" v-for="(brand, index) in brands" :key="index">
                            <label>
                                <input v-model="sortData.brandIds" :value="brand.brand_id" type="checkbox"><span>{{ brand.brand_name }} </span>
                            </label>
                        </li>
                    </ol>
                </div>
            </div><!-- Filter Item -->


            <!-- filter color-->
            <div v-if="colors.length > 0" class="filter-options-item filter-options-color">
                <div class="filter-options-title">{{ $tc('products.color',colors.length)}}</div>
                <div class="filter-options-content">
                    <ol class="items">
                        <li class="item" v-for="(color,index) in colors" :key="index">
                            <label>
                                <input v-model="sortData.colorIds" :value="color.color_id" type="checkbox">
                                <span>
                                    <span class="img" :style="{'background-color':color.color_code}"
                                          style=" border: 1px solid #ccc;"></span>
                                    <span class="count">{{ color.color_name }}</span>
                                </span>

                            </label>
                        </li>
                    </ol>
                </div>
            </div><!-- Filter Item -->

            <!-- Filter Item  size-->
            <div v-if="sizes.length > 0" class="filter-options-item filter-options-size">
                <div class="filter-options-title">{{ $tc('products.size',sizes.length)}}</div>
                <div class="filter-options-content">
                    <ol class="items">
                        <li class="item" v-for="(size, index) in sizes" :key="index">
                            <label>
                                <input type="checkbox" v-model="sortData.sizeIds" :value="size.size_id"><span>{{ size.size_name }}</span>
                            </label>
                        </li>
                    </ol>
                </div>
            </div><!-- Filter Item  size-->
        </div>
    </div><!-- Filter -->

</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import _ from 'lodash';
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    export default {
        name: "ProductSidebar",
        props: {
            categoryid: [Number],
            /*search_min_price: {
                type:[String, Number],
                default: 1,
            },
            search_max_price: {
                type: [String, Number],
                default: 10000,
            }*/
        },
        components: {
            VueSlider
        },
        data() {
            return {
                reqData: {
                    category_id: '',
                },
                sortData: {
                    sorting: 'yes',
                    category_id: '',
                    brandIds: [],
                    colorIds: [],
                    sizeIds: [],
                    paginate: 20,
                    range:[],
                },

                tooltipOptions: [{
                    tooltip: 'always'
                }, {
                    tooltip: 'always'
                }]
            }
        },
        created() {
            this.reqData.category_id = this.categoryid;
            this.sortData.category_id = this.categoryid;
        },
        mounted() {
            this.getProductSidebar(this.reqData);
        },
        methods: {
            ...mapActions([
                'getProductSidebar',
                'getSortingProducts'
            ]),
            sortingProducts: _.debounce(function () {
                this.getSortingProducts(this.sortData);
            }, 500)
        },
        computed: {
            ...mapGetters([
                'brands',
                'colors',
                'tags',
                'sizes',
                'search_min_price',
                'search_max_price',
            ]),
            sortDataCheck() {
                return JSON.parse(JSON.stringify(this.sortData));
            },
            searchMinPriceDataCheck() {
                return JSON.parse(JSON.stringify(this.search_min_price));
            },
            searchMaxPriceDataCheck() {
                return JSON.parse(JSON.stringify(this.search_max_price));
            },
        },
        watch: {
            sortDataCheck: {
                handler(newValue, oldValue) {
                    if (newValue !== oldValue) {
                        if(this.sortData.range.length !== 0){
                            this.sortingProducts();
                        }
                    }
                }
            },
            searchMinPriceDataCheck: {
                handler(newValue, oldValue) {
                    if (newValue !== oldValue) {
                        this.sortData.range.push(this.search_min_price);
                    }
                }
            },
            searchMaxPriceDataCheck: {
                handler(newValue, oldValue) {
                    if (newValue !== oldValue) {
                        this.sortData.range.push(this.search_max_price);
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>
