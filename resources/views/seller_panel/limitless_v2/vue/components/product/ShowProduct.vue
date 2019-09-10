<template>
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-md-2">
                <!-- Detached sidebar -->

                    <div class=" sidebar-default">
                        <div class="sidebar-content" style="padding-bottom:0px;">

                                <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                                    <div class="content-group-sm">
                                        <h6 class="text-semibold no-margin-bottom">
                                            Victoria Davidson
                                        </h6>

                                        <span class="display-block">Head of UX</span>
                                    </div>

                                    <a href="#" class="display-inline-block content-group-sm">
                                        <img src="assets/images/placeholder.jpg" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
                                    </a>

                                    <ul class="list-inline list-inline-condensed no-margin-bottom">
                                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>
                                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-github"></i></a></li>
                                    </ul>
                                </div>

                                <div class="panel no-border-top no-border-radius-top " style="margin-bottom:0px;">
                                    <ul class="navigation">
                                        <li class="navigation-header">Navigation</li>
                                        <li class="active"><a href="#basic" data-toggle="tab"><i class="icon-files-empty"></i> Basic Info</a></li>
                                        <li><a href="#details" data-toggle="tab"><i class="icon-files-empty"></i> Details</a></li>
                                        <li><a href="#reviews" data-toggle="tab"><i class="icon-files-empty"></i> Reviews</a></li>
                                        <li><a href="#orders" data-toggle="tab"><i class="icon-files-empty"></i> Orders</a></li>
                                        <li class="navigation-divider"></li>
                                        <li><a href="login_advanced.html"><i class="icon-switch2"></i> Log out</a></li>
                                    </ul>
                                </div>


                        </div>
                    </div>

            </div>
            <div class="col-md-10">
                <!-- Detached content -->
                <div class="container-detached">
                    <div class="content-detached">

                        <!-- Tab content -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="basic">

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
                                                <p v-if="product.brand !== null " style="margin-bottom: 5px;">
                                                    <i class="icon-hammer-wrench text-primary" style="margin-right: .5rem;"></i>
                                                    <span class="text text-bold text-teal ">{{ product.brand.name }}</span>
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
                            </div>

                            <div class="tab-pane fade" id="details">

                                <!-- Available hours -->
                                <div class="panel ">
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

                                    <div class="panel-body">
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
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">My details</h6>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    </div>
                                </div>
                                <!-- /calendar -->
                            </div>

                            <div class="tab-pane fade" id="reviews">

                                <!-- Available hours -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Available hours</h6>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    </div>
                                </div>
                                <!-- /available hours -->


                                <!-- Calendar -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">My details</h6>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    </div>
                                </div>
                                <!-- /calendar -->
                            </div>

                            <div class="tab-pane fade" id="orders">

                                <!-- Available hours -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Available hours</h6>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    </div>
                                </div>
                                <!-- /available hours -->


                                <!-- Calendar -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">My details</h6>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    </div>
                                </div>
                                <!-- /calendar -->
                            </div>
                        </div>
                        <!-- /tab content -->

                    </div>
                </div>
                <!-- /detached content -->
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
                    newVal.productImages.forEach(image=>{
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