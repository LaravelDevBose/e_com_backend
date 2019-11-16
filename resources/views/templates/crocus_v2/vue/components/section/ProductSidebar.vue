<template>
    <div>
        <div class="hot-banner">
            <img alt="banner" src="/crocus_v2/images/hot-trends-banner.jpg">
        </div>
        <div class="block block-layered-nav">
            <div class="block-title">Shop By</div>
            <div class="block-content">
                <p class="block-subtitle">Shopping Options</p>
                <dl id="narrow-by-list">
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
        <div v-if="tags" class="block block-tags">
            <div class="block-title"> Popular Tags</div>
            <div class="block-content">
                <ul class="tags-list">
                    <li v-for="(tag,index) in tags" :key="index">
                        <input type="checkbox" :id="'tag-'+tag.tag_id" v-model="sortData.tagIds" :value="tag.tag_id">
                        <label :for="'tag-'+tag.tag_id">{{ tag.tag_title }}</label>
                    </li>
                </ul>
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
                }
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
            },400)
        },
        computed:{
            ...mapGetters([
                'brands',
                'colors',
                'tags',
                'sizes',
            ]),
            sortDataCheck(){
                return JSON.parse(JSON.stringify(this.sortData));
            },
        },
        watch:{
            sortDataCheck:{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.sortingProducts()
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
