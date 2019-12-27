<template>
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Daily stats -->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h6 class="panel-title">Product Details</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <carousel :data="slider" indicators="hover"></carousel>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-semibold" style="margin-top: 0px;">
                                    <a href="#" class="text-default">{{ product.product_name}}</a>
                                </h3>
                                <p v-if="product.product_sku !== '' " style="margin-bottom: 5px;" >
                                    <i class="icon-barcode2 text-primary" style="margin-right: .5rem;"></i>
                                    <span class="text text-bold text-teal ">{{ product.product_sku }}</span>
                                </p>
                                <p class="text text-bold font-weight-bold text-teal" style="margin-bottom: 5px;" v-if="category !== '' " >
                                    <i class="icon-list2 text-primary" style="margin-right: .5rem;"></i>
                                    <span v-if="trd_category !== '' " > {{ trd_category.name}} <i class="icon-arrow-right15"></i></span>
                                    <span v-if="sec_category !== '' " >{{ sec_category.name}} <i class="icon-arrow-right15"></i></span>
                                    <span>{{ category.name}}</span>
                                </p>
                                <p v-if="product.brand" style="margin-bottom: 5px;">
                                    <i class="icon-hammer-wrench text-primary" style="margin-right: .5rem;"></i>
                                    <span class="text text-bold text-teal ">{{ product.brand.name }}</span>
                                </p>
                                <p v-if="product.seller.shop" style="margin-bottom: 5px;">
                                    <i class="icon-store2 text-primary" style="margin-right: .5rem;"></i>
                                    <span class="text text-bold text-teal ">{{ product.seller.shop.name }}</span>
                                </p>
                                <p v-if="product.seller !== null && product.seller.name  !== '' " style="margin-bottom: 5px;">
                                    <i class="icon-user text-primary" style="margin-right: .5rem;"></i>
                                    <span class="text text-bold text-teal ">{{ product.seller.name }}</span>
                                </p>
                                <div class="content-group" v-if="product.product_type === 1">
                                    <p style="margin-bottom: 5px;">
                                        Price:
                                        <span class="text text-bold text-teal ">{{ product.product_price }}</span>
                                    </p>
                                    <p style="margin-bottom: 5px;">
                                        Qty:
                                        <span class="text text-bold text-teal ">{{ product.product_qty }}</span>
                                    </p>
                                </div>
                                <p v-if="product.discount_price !== 0 && product.discount_price  !== '' " style="margin-bottom: 5px;">
                                    Discount:
                                    <span class="text text-bold text-teal ">{{ product.discount_price }}</span>
                                </p>
                                <div class="content-group">
                                    <p v-html="product.highlight"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h6 class="panel-title">Product Full Description</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="content-group" v-html="product.description">

                        </div>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h6 class="panel-title">Product Details EN</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="content-group">
                            <p class="text text-bold">Product Name (EN) : {{product.lang_product_name }}</p>
                        </div>
                        <div class="content-group">
                            <p class="text text-bold" style="margin-bottom: .5rem;">Product Highlight (EN): </p>
                            <p v-html="product.lang_highlight"></p>
                        </div>
                        <div class="content-group" >
                            <p class="text text-bold" style="margin-bottom: .5rem;">Product Description (EN): </p>
                            <p v-html="product.lang_description" ></p>
                        </div>
                    </div>
                </div>

                <!-- Available hours -->
                <div class="panel" v-if="typeof product.details !== 'undefined' && product.details !== '' ">
                    <div class="panel-heading bg-teal-300">
                        <h6 class="panel-title">Product Extra Details</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body" >
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Main Material: </span>
                                <span v-if="product.details.materials" v-html="product.details.materials"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Product Model: </span>
                                <span v-if="product.details.model" v-html="product.details.model"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">No. Of Pieces : </span>
                                <span v-if="product.details.pieces" v-html="product.details.pieces"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Product Occasion: </span>
                                <span v-if="product.details.occasion" v-html="product.details.occasion"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Color Shade : </span>
                                <span v-if="product.details.color_shade" v-html="product.details.color_shade"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Skin Type: </span>
                                <span v-if="product.details.skin_type" v-html="product.details.skin_type"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Extra Details : </span>
                                <span v-if="product.details.extra_details" v-html="product.details.extra_details"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Warranty Policy: </span>
                                <span v-if="product.details.warranty_policy" v-html="product.details.warranty_policy"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Warranty Policy (EN): </span>
                                <span v-if="product.details.warranty_policy_eng" v-html="product.details.warranty_policy_eng"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Warranty Period : </span>
                                <span v-if="product.details.warranty_period" >{{ product.details.warranty_period }} days</span>
                                <span v-else class="text-size-small text-slate-400">0 Day</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /available hours -->

                <!-- Calendar -->
                <div class="panel" v-if="product.variationsData.length !== 0 && typeof product.variationsData !== 'undefined'">
                    <div class="panel-heading bg-teal">
                        <h6 class="panel-title">Product Variations</h6>
                    </div>

                    <div class="panel-body">
                        <table class="table table-sm table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <td>Color</td>
                                    <td>Size</td>
                                    <td>SKU</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="variaction in product.variationsData">
                                    <td>{{ variaction.primary_model.color_name }}</td>
                                    <td>{{ variaction.secondary_model.size_name }}</td>
                                    <td>{{ variaction.seller_sku}}</td>
                                    <td>{{ variaction.quantity}}</td>
                                    <td> {{ variaction.price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /calendar -->
            </div>
        </div>

    </div>
    <!-- /content area -->
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';
    export default {
        name: "ShowProduct",
        data(){
            return{
                slider: [],
                category:'',
                sec_category:'',
                trd_category:'',
            }
        },
        created() {
            this.singleProduct(this.$attrs['productid']).then(response=>{
                if(response.status === 'error'){
                    Notify.error(response.message);
                }
            }).catch(error=>{
                // Notify.error(error.message);
            })
        },
        methods:{
            ...mapActions([
                'singleProduct',
            ])
        },
        computed:{
            ...mapGetters([
                'product'
            ])
        },
        watch:{
            product:{
                handler(newVal, oldVal){
                    newVal.images.forEach(image=>{
                        let img = '<img src="'+image.image.image_path+'" class="img-thumbnail">';
                        this.slider.push(img);
                    });
                    if(newVal.category !== null){
                        this.category = newVal.category
                    }
                    if(newVal.category.parent !== null){
                        this.sec_category = newVal.category.parent;
                    }
                    if(newVal.category.parent.parent !== null){
                        this.trd_category = newVal.category.parent.parent;
                    }


                }
            }
        }
    }
</script>

<style scoped>

</style>
