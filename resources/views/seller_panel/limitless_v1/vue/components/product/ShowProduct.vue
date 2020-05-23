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
                                    <a href="#" class="text-default">{{ proData.product_name}}</a>
                                </h3>
                                <p v-if="proData.product_sku !== '' " style="margin-bottom: 5px;" >
                                    <span class="text text-bold text-info" style="margin-right: .5rem;">SKU: </span>
                                    <span class="text text-bold text-teal ">{{ proData.product_sku }}</span>
                                </p>
                                <p class="text text-bold font-weight-bold text-teal" style="margin-bottom: 5px;" v-if="category !== '' " >
                                    <span class="text-info" style="margin-right: .5rem;">Category: </span>
                                    <span v-if="trd_category !== '' " > {{ trd_category.name}} <i class="icon-arrow-right15"></i></span>
                                    <span v-if="sec_category !== '' " >{{ sec_category.name}} <i class="icon-arrow-right15"></i></span>
                                    <span>{{ category.name}}</span>
                                </p>
                                <p v-if="proData.brand" style="margin-bottom: 5px;">
                                    <span class="text text-bold text-info" style="margin-right: .5rem;">Brand: </span>
                                    <span class="text text-bold text-teal ">{{ proData.brand.name }}</span>
                                </p>
                                <div class="content-group" v-if="proData.product_type === 1" style="margin-bottom: 0px!important;">
                                    <p style="margin-bottom: 5px;">
                                        <span class="text text-bold text-info ">
                                            Product Price:
                                        </span>
                                        <span class="text text-bold text-teal ">{{ proData.product_price }}</span>
                                    </p>
                                    <p style="margin-bottom: 5px;">
                                        <span class="text text-bold text-info ">
                                            Qty:
                                       </span>
                                        <span class="text text-bold text-teal ">{{ proData.product_qty }}</span>
                                    </p>
                                </div>
                                <p v-if="proData.discount_price !== 0 && proData.discount_price  !== '' " style="margin-bottom: 5px;">
                                    <span class="text text-bold text-info ">
                                         Discount:
                                   </span>
                                    <span class="text text-bold text-teal ">{{ proData.discount }}</span>
                                </p>
                                <div class="content-group">
                                    <span class="text text-bold text-info ">
                                        Product Highlight:
                                   </span>
                                    <p v-html="proData.highlight"></p>
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
                        <div class="content-group" v-html="proData.description">

                        </div>
                    </div>
                </div>

                <!--<div class="panel panel-info">
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
                            <p class="text text-bold">Product Name (EN) : {{proData.lang_product_name }}</p>
                        </div>
                        <div class="content-group">
                            <p class="text text-bold" style="margin-bottom: .5rem;">Product Highlight (EN): </p>
                            <p v-html="proData.lang_highlight"></p>
                        </div>
                        <div class="content-group" >
                            <p class="text text-bold" style="margin-bottom: .5rem;">Product Description (EN): </p>
                            <p v-html="proData.lang_description" ></p>
                        </div>
                    </div>
                </div>
                <div class="panel" v-if="typeof proDetails !== 'undefined' && proDetails !== '' ">
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
                                <span v-if="proDetails.materials" v-html="proDetails.materials"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Product Model: </span>
                                <span v-if="proDetails.model" v-html="proDetails.model"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">No. Of Pieces : </span>
                                <span v-if="proDetails.pieces" v-html="proDetails.pieces"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Product Occasion: </span>
                                <span v-if="proDetails.occasion" v-html="proDetails.occasion"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Color Shade : </span>
                                <span v-if="proDetails.color_shade" v-html="proDetails.color_shade"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Skin Type: </span>
                                <span v-if="proDetails.skin_type" v-html="proDetails.skin_type"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Extra Details : </span>
                                <span v-if="proDetails.extra_details" v-html="proDetails.extra_details"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Warranty Policy: </span>
                                <span v-if="proDetails.warranty_policy" v-html="proDetails.warranty_policy"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Warranty Policy (EN): </span>
                                <span v-if="proDetails.warranty_policy_eng" v-html="proDetails.warranty_policy_eng"></span>
                                <span v-else class="text-size-small text-slate-400">No Data</span>
                            </p>
                        </div>
                        <div class="content-group">
                            <p style="margin-bottom: .5rem;">
                                <span class="text-bold">Warranty Period : </span>
                                <span v-if="proDetails.warranty_period" >{{ proDetails.warranty_period }} days</span>
                                <span v-else class="text-size-small text-slate-400">0 Day</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel" v-if="proVariations.length !== 0 && typeof proVariations !== 'undefined'">
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
                            <tr v-for="variaction in proVariations">
                                <td>{{ variaction.primary_model.color_name }}</td>
                                <td>{{ variaction.secondary_model.size_name }}</td>
                                <td>{{ variaction.seller_sku}}</td>
                                <td>{{ variaction.quantity}}</td>
                                <td> {{ variaction.price }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>-->
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
                'proData',
                'proDetails',
                'proVariations',
                'proImages'
            ])
        },
        watch:{
            proData:{
                handler(newVal, oldVal){
                    this.proImages.forEach(image=>{
                        let img = '<img src="'+image.image.image_path+'" class="img-thumbnail">';
                        this.slider.push(img);
                    });
                    if(newVal.category !== null){
                        this.category = newVal.category;

                        if(newVal.category.parent !== null){
                            this.sec_category = newVal.category.parent;

                            if(newVal.category.parent.parent !== null){
                                this.trd_category = newVal.category.parent.parent;
                            }
                        }

                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
