<template>
    <div class="CreateVoucher">
        <div class="content">
            <form action="" @submit.prevent="storeVoucher">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Voucher Details</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Voucher Name:</label>
                                    <input type="text" class="form-control" placeholder="Voucher name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Start Date:</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="text" class="form-control daterange-single" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control pickatime" placeholder="Start time">
                                                <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>End Date:</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="text" class="form-control daterange-single" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control pickatime" placeholder="Start time">
                                                <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Type:</label>
                                    <select class="select form-control" data-width="100%">
                                        <option value="">Select A Type</option>
                                        <option value="Supplier">Supplier Wise</option>
                                        <option value="Date">Date Wise</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group hidden">
                                    <label>Collect Start Time:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control daterange-single" >
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Code:</label>
                                    <input type="text" class="form-control" placeholder="Voucher Code" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Voucher Setting</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discount Type:</label>
                                    <select class="select form-control" data-width="100%">
                                        <option value="">Select A Type</option>
                                        <option value="Supplier">Supplier Wise</option>
                                        <option value="Date">Date Wise</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discount Value(off):</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Min Order Value:</label>
                                    <input type="text" class="form-control" placeholder="Minimum order value to apply voucher (BDT)" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maximum Discount:</label>
                                    <input type="text" class="form-control" placeholder="Maximum discount in (BDT)" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Voucher to be issued:</label>
                                    <input type="text" class="form-control" placeholder="Total voucher to be issued" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>User Limit per Customer:</label>
                                    <input type="text" class="form-control" placeholder="User Limit per Customer " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apply To:</label>
                                    <select class="select form-control" data-width="100%">
                                        <option value="Supplier">Supplier Wise</option>
                                        <option value="Date">Date Wise</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-submit-btn" >
                    <div class="panel panel-default">
                        <div class="panel-body" >
                            <div class="row">
                                <div class="col-md-2 col-md-offset-8">
                                    <div class="content-group-lg"  style="margin-bottom:0!important;">
                                        <div class="checkbox checkbox-switchery">
                                            <label>
                                                <input type="checkbox" class="switchery-primary" checked="checked">
                                                Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" class="btn btn-primary btn-block">Save Voucher <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name:'CreateVoucher'
    };
</script>

<style scoped>
    .sticky-submit-btn{
        position: -webkit-sticky;
        position: sticky;
        bottom: 50px;
    }
</style>
