<template>
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-md-2">
                <!-- Detached sidebar -->
                <div class="sidebar-detached">
                    <div class="sidebar sidebar-default sidebar-separate">
                        <div class="sidebar-content">

                            <!-- User details -->
                            <div class="content-group">
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

                                <div class="panel no-border-top no-border-radius-top">
                                    <ul class="navigation">
                                        <li class="navigation-header">Navigation</li>
                                        <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-files-empty"></i> Profile</a></li>
                                        <li><a href="#schedule" data-toggle="tab"><i class="icon-files-empty"></i> Schedule</a></li>
                                        <li><a href="#messages" data-toggle="tab"><i class="icon-files-empty"></i> Inbox <span class="badge bg-warning-400">23</span></a></li>
                                        <li><a href="#orders" data-toggle="tab"><i class="icon-files-empty"></i> Orders</a></li>
                                        <li class="navigation-divider"></li>
                                        <li><a href="login_advanced.html"><i class="icon-switch2"></i> Log out</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /user details -->

                        </div>
                    </div>
                </div>
                <!-- /detached sidebar -->
            </div>
            <div class="col-md-10">
                <!-- Detached content -->
                <div class="container-detached">
                    <div class="content-detached">

                        <!-- Tab content -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="profile">

                                <!-- Daily stats -->
                                <div class="panel panel-flat">
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
                                            <div class="col-md-5">
                                                <carousel :data="data" indicators="hover"></carousel>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="schedule">

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
                                        <h6 class="panel-title">My schedule</h6>
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

    export default {
        name: "ShowProduct",
        data(){
            return{
                data: [
                    '<div class="example-slide">Slide 1</div>',
                    '<div class="example-slide">Slide 2</div>',
                    '<div class="example-slide">Slide 3</div>',
                ],
            }
        }
    }
</script>

<style scoped>

</style>