<template>
    <div class="content">
        <div class="row">
            <div class="col-md-2">
                <!-- Detached sidebar -->

                <div class=" sidebar-default">
                    <div class="sidebar-content" style="padding-bottom:0px;">

                        <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                            <div class="content-group-sm">
                                <h6 class="text-semibold no-margin-bottom">{{ shopInfo.shop_name }}</h6>
                                <span class="display-block">Shop Status: {{ sellerInfo.status_label }}</span>
                            </div>

                            <a href="#" class="display-inline-block content-group-sm">
                                <img :src="shopInfo.shop_logo.image_path" class="img-circle img-responsive" :alt="shopInfo.shop_name " style="width: 110px; height: 110px;">
                            </a>

                            <!--<ul class="list-inline list-inline-condensed no-margin-bottom">
                                <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>
                                <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                                <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-github"></i></a></li>
                            </ul>-->
                        </div>

                        <div class="panel no-border-top no-border-radius-top " style="margin-bottom:0px;">
                            <ul class="navigation">
                                <li class="navigation-header">Navigation</li>
                                <li class="active"><a href="#info" data-toggle="tab"><i class="icon-files-empty"></i>Shop Info</a></li>
                                <li><a href="#products" data-toggle="tab"><i class="icon-files-empty"></i> Products</a></li>
                                <li><a href="#orders" data-toggle="tab"><i class="icon-files-empty"></i> Orders</a></li>
                                <li><a href="#reports" data-toggle="tab"><i class="icon-files-empty"></i> Reports</a></li>
                                <li class="navigation-divider"></li>
<!--                                <li><a href="login_advanced.html"><i class="icon-switch2"></i> Log out</a></li>-->
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
                            <div class="tab-pane fade in active" id="info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel ">
                                            <div class="panel-heading bg-teal">
                                                <h6 class="panel-title">Shop Details</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive content-group">
                                                            <table class="table table-striped table-sm">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="text-info-800"><i class="icon-store2"></i></td>
                                                                    <td>
                                                                        <span>{{ shopInfo.shop_name }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-info-800"><i class="icon-envelope"></i></td>
                                                                    <td>
                                                                        <span>{{ shopInfo.shop_email }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-info-800"><i class="icon-phone"></i></td>
                                                                    <td>
                                                                        <span>{{ shopInfo.phone_no }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-info-800"><i class="icon-location4"></i></td>
                                                                    <td>
                                                                        <span v-html="shopInfo.shop_address"></span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel">
                                            <div class="panel-heading bg-teal-800">
                                                <h6 class="panel-title">Seller Details</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive content-group">
                                                            <table class="table table-striped table-sm">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="text-info-800"><i class="icon-user"></i></td>
                                                                    <td>
                                                                        <span>{{ sellerInfo.user.full_name }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-info-800"><i class="icon-envelope"></i></td>
                                                                    <td>
                                                                        <span>{{ sellerInfo.user.email }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-info-800"><i class="icon-phone"></i></td>
                                                                    <td>
                                                                        <span>{{ sellerInfo.user.phone_no }}</span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="panel panel-body bg-success-400 has-bg-image">
                                                    <div class="media no-margin">
                                                        <div class="media-body">
                                                            <h3 class="no-margin">{{ overviewReport.total_sale }}</h3>
                                                            <span class="text-uppercase text-size-mini">total Sales</span>
                                                        </div>

                                                        <div class="media-right media-middle">
                                                            <i class="icon-cash3 icon-3x opacity-75"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-3">
                                                <div class="panel panel-body bg-primary-400 has-bg-image">
                                                    <div class="media no-margin">
                                                        <div class="media-body">
                                                            <h3 class="no-margin">{{ overviewReport.total_order }}</h3>
                                                            <span class="text-uppercase text-size-mini">total orders</span>
                                                        </div>

                                                        <div class="media-right media-middle">
                                                            <i class="icon-cart2 icon-3x opacity-75"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-3">
                                                <div class="panel panel-body bg-purple-400 has-bg-image">
                                                    <div class="media no-margin">
                                                        <div class="media-left media-middle">
                                                            <i class="icon-cart-add icon-3x opacity-75"></i>
                                                        </div>

                                                        <div class="media-body text-right">
                                                            <h3 class="no-margin">{{ overviewReport.total_order_qty }}</h3>
                                                            <span class="text-uppercase text-size-mini">total Order Qty</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-3">
                                                <div class="panel panel-body bg-indigo-400 has-bg-image">
                                                    <div class="media no-margin">
                                                        <div class="media-left media-middle">
                                                            <i class="icon-bag icon-3x opacity-75"></i>
                                                        </div>

                                                        <div class="media-body text-right">
                                                            <h3 class="no-margin">{{ overviewReport.total_product}}</h3>
                                                            <span class="text-uppercase text-size-mini">total Products</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="panel ">
                                            <div class="panel-heading bg-violet border-indigo">
                                                <h6 class="panel-title">Shop last Orders</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                    <table class="table table-striped  table-bordered table-sm">
                                                        <thead>
                                                            <tr>
                                                                <td>Image</td>
                                                                <td>Product Info</td>
                                                                <td>Order No</td>
                                                                <td>Order Date</td>
                                                                <td>Buyer Info</td>
                                                                <td>Brand </td>
                                                                <td>Price </td>
                                                                <td>Qty </td>
                                                                <td>Total </td>
                                                                <td>Status </td>
                                                                <td>Action </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-if="latestOrders" v-for="(orderItem,index) in latestOrders" :key="index">
                                                            <td>
                                                                <img v-if="orderItem.product.thumb_image.image_path" :src="orderItem.product.thumb_image.image_path" :alt="orderItem.product_name"  style="width:40px; height:40px">
                                                            </td>
                                                            <td>
                                                                <a href="#" @click.prevent="goToProductPage(orderItem.product.product_slug)" class="text-semibold">{{ orderItem.product_name }}</a>
                                                                <div class="text-muted text-size-small">
                                                                    <span class="status-mark bg-grey position-left"></span>
                                                                    {{ orderItem.product.product_sku }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span>{{ orderItem.order.order_no }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ orderItem.order.order_date }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ orderItem.buyer.user.full_name }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ orderItem.brand }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ orderItem.price }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ orderItem.qty }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ orderItem.total_price }}</span>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                        <span  class="label  dropdown-toggle"
                                                                               :class="{'bg-info':orderItem.item_status == 1, 'bg-danger':orderItem.item_status == 2, 'bg-warning':orderItem.item_status == 3, 'bg-primary':orderItem.item_status == 4, 'bg-indigo-400':orderItem.item_status == 5, 'bg-teal':orderItem.item_status == 6 }"
                                                                               data-toggle="dropdown" aria-expanded="false">
                                                                            {{ orderItem.item_status_label }}
                                                                        </span>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <ul class="icons-list">
                                                                    <li><a href="#" class="text text-primary-700" @click.prevent="goToProductPage(orderItem.product.product_slug)"><i class="icon-bag"></i></a></li>
                                                                    <li><a href="#" class="text text-info" @click.prevent="showInvoiceModalView(orderItem.order.order_no)"><i class="icon-file-eye"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr v-else>
                                                            <td colspan="1">
                                                                <div class="alert alert-info">No Order Found</div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="products">

                                <!-- Available hours -->
                                <div class="panel ">
                                    <div class="panel-heading bg-teal-300">
                                        <h6 class="panel-title">Product List</h6>
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
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Shop Order List</h6>
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
                            </div>

                            <div class="tab-pane fade" id="reports">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Shop Report</h6>
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
                            </div>
                        </div>
                        <!-- /tab content -->

                    </div>
                </div>
                <!-- /detached content -->
            </div>
        </div>
        <invoice-modal-view></invoice-modal-view>
    </div>

    <!-- /content area -->
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import InvoiceModalView from "../invoice/InvoiceModalView";

    export default {
        name: "ShopDetailsPage",
        props:{
            sellerid:[Number, String]
        },
        components: {InvoiceModalView},
        data(){
            return{
                reqData:{
                    shop_id:'',
                    seller_id:'',
                    paginate:20,
                }
            }
        },
        created(){
            this.reqData.shop_id = 0;
            this.reqData.seller_id = this.sellerid
        },
        mounted(){
            this.getShopInfoSectionData(this.reqData);
        },
        methods:{
            ...mapActions([
                'getShopInfoSectionData',
                'getShopProducts',
                'getShopOrders',
                'getShopReports',
                'getOrderInfo'
            ]),
            goToProductPage(slug){
                window.location = '/admin/product/'+slug;
            },
            showInvoiceModalView(order_no){
                this.getOrderInfo(order_no)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            $('#invoice').modal('show');
                        }else{
                            alert(response.message);
                        }

                    })
            },
        },
        computed:{
            ...mapGetters([
                'shopInfo',
                'sellerInfo',
                'overviewReport',
                'latestOrders',
                'shopOrders',
                'shopProducts',
                'shopReports',
            ])
        }
    }
</script>

<style scoped>

</style>
