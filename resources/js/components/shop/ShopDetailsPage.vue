<template>
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
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Shop Details</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Seller Details</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Shop Overview Report</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Recent Orders</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">


                                                </div>
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

    </div>
    <!-- /content area -->
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ShopDetailsPage",
        props:{
            sellerid:[Number, String]
        },
        data(){
            return{
                reqData:{
                    shop_id:'',
                    seller_id:''
                }
            }
        },
        created(){
            this.reqData.shop_id = 0;
            this.reqData.seller_id = this.sellerid
        },
        mounted(){
            this.getShopInfoSectionData();
        },
        methods:{
            ...mapActions([
                'getShopInfoSectionData',
                'getShopProducts',
                'getShopOrders',
                'getShopReports',
            ])
        },
        computed:{
            ...mapGetters([
                'shopInfo',
                'sellerInfo',
                'overviewReport',
                'shopOrders',
                'shopProducts',
                'shopReports',
            ])
        }
    }
</script>

<style scoped>

</style>
