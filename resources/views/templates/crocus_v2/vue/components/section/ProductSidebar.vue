<template>
    <div>
        <div class="block block-layered-nav">
            <div class="block-title">Shop By</div>
            <div class="block-content">
                <p class="block-subtitle">Price</p>
                <dl id="narrow-by-list">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-6">
                            <input type="number" style="display:block" v-model="sortData.range.min" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="number" style="display:block" v-model="sortData.range.max" class="form-control">
                        </div>
                    </div>
                    <dt class="even">Manufacturer</dt>
                    <dd class="even" v-if="brands">
                        <ol>
                            <li v-for="(brand, index) in brands" :key="index">
                                <input v-model="sortData.brandIds" :value="brand.brand_id" :id="'brand-'+brand.brand_id"  type="checkbox">
                                <label :for="'brand-'+brand.brand_id">{{ brand.brand_name }} </label>
                            </li>
                        </ol>
                    </dd>
                    <dt class="odd">Color</dt>
                    <dd class="odd colorlist" v-if="colors">
                        <ol>
                            <li v-for="(color,index) in colors" :key="index">
                                <input v-model="sortData.colorIds" :value="color.color_id" :id="'color-'+color.color_id"  type="checkbox">
                                <label class="color"  :for="'color-'+color.color_id" :style="{'background-color':color.color_code}" ></label>
                            </li>
                        </ol>
                    </dd>

                    <dt class="last even">Size</dt>
                    <dd class="last even" v-if="sizes">
                        <ol>
                            <li v-for="(size, index) in sizes" :key="index">
                                <input type="checkbox" :id="'size-'+size.size_id" v-model="sortData.sizeIds" :value="size.size_id">
                                <label :for="'size-'+size.size_id">{{ size.size_name }}</label>
                            </li>
                        </ol>
                    </dd>

                </dl>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import _ from 'lodash';

    export default {
        name: "ProductSidebar",
        props:{
            categoryid:[Number]
        },
        data(){
            return{
                reqData:{
                    category_id:'',
                },
                sortData:{
                    sorting:'yes',
                    category_id:'',
                    brandIds:[],
                    colorIds:[],
                    sizeIds:[],
                    tagIds:[],
                    paginate:20,
                    range:{
                        min: 1,
                        max: 10000,
                    },
                },
            }
        },
        created(){
            this.reqData.category_id = this.categoryid;
            this.sortData.category_id = this.categoryid;
        },
        mounted(){
            this.getProductSidebar(this.reqData)
        },
        methods:{
            ...mapActions([
                'getProductSidebar',
                'getSortingProducts'
            ]),
            sortingProducts: _.debounce(function() {
                this.getSortingProducts(this.sortData);
            },500)
        },
        computed:{
            ...mapGetters([
                'brands',
                'colors',
                'tags',
                'sizes',
                'search_min_price',
                'search_max_price',
            ]),
            sortDataCheck(){
                return JSON.parse(JSON.stringify(this.sortData));
            },
            searchMinPriceDataCheck() {
                return JSON.parse(JSON.stringify(this.search_min_price));
            },
            searchMaxPriceDataCheck() {
                return JSON.parse(JSON.stringify(this.search_max_price));
            },
        },
        watch:{
            sortDataCheck:{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.sortingProducts()
                    }
                }
            },
            searchMinPriceDataCheck: {
                handler(newValue, oldValue) {
                    if (newValue !== oldValue) {
                        this.sortData.range.min = this.search_min_price;
                    }
                }
            },
            searchMaxPriceDataCheck: {
                handler(newValue, oldValue) {
                    if (newValue !== oldValue) {
                        this.sortData.range.max = this.search_max_price;
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>
