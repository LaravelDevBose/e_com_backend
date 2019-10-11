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
                                <input v-model="sortData.brandIds" :value="brand.brand_id"  type="checkbox"><span>{{ brand.brand_name }} </span>
                            </li>
                        </ol>
                    </dd>
                    <dt class="odd">Color</dt>
                    <dd class="odd" v-if="colors">
                        <ol>
                            <li v-for="(color,index) in colors" :key="index">
                                <input v-model="sortData.colorIds" :value="color.color_id" type="checkbox">
                                <span class="img" :style="{'background-color':color.color_code}"  style=" border: 1px solid #ccc; width: 10px; height: 20px;"></span>
                            </li>
                        </ol>
                    </dd>

                    <dt class="last even">Size</dt>
                    <dd class="last even" v-if="sizes">
                        <ol>
                            <li v-for="(size, index) in sizes" :key="index">
                                <label>
                                    <input type="checkbox" v-model="sortData.sizeIds" :value="size.size_id"><span>{{ size.size_name }}</span>
                                </label>
                            </li>
                        </ol>
                    </dd>

                </dl>
            </div>
        </div>
        <div class="block block-list block-viewed">
            <div class="block-title"> Recently Viewed </div>
            <div class="block-content">
                <ol id="recently-viewed-items">
                    <li class="item odd">
                        <p class="product-name"><a href="#"> ThinkPad X1 Ultrabook </a></p>
                    </li>
                    <li class="item even">
                        <p class="product-name"><a href="#"> Samsung GALAXY Note </a></p>
                    </li>
                    <li class="item last odd">
                        <p class="product-name"><a href="#"> QX30 Lens Camera </a></p>
                    </li>
                </ol>
            </div>
        </div>
        <div v-if="tags" class="block block-tags">
            <div class="block-title"> Popular Tags</div>
            <div class="block-content">
                <ul class="tags-list">
                    <li v-for="(tag,index) in tags" :key="index">
                        <input type="checkbox" v-model="sortData.tagIds" :value="tag.tag_id">
                        <span>tag.tag_title</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

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
