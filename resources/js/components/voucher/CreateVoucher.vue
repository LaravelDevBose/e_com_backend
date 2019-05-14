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
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm">
                                    <label>Start Date:</label>
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="from_date"  placeholder="Pick a date&hellip;" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm">
                                    <label>End Date:</label>
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="from_date"  placeholder="Pick a date&hellip;" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Type:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Collect Start Time:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6 hidden">
                                <div class="form-group">
                                    <label>Collect Start Time:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Code:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Code:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-6">
                                <div class="content-group-lg">
                                    <div class="checkbox checkbox-switchery">
                                        <label>
                                            <input type="checkbox" class="switchery-primary" checked="checked">
                                            Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="text-right form-group">
                                    <button type="submit" class="btn btn-primary">Save Category <i class="icon-arrow-right14 position-right"></i></button>
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
                                    <label>Voucher Name:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Start Date:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>End Date:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Type:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Collect Start Time:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6 hidden">
                                <div class="form-group">
                                    <label>Collect Start Time:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Code:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Code:</label>
                                    <input type="text" class="form-control" placeholder="Category Name " required>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-6">
                                <div class="content-group-lg">
                                    <div class="checkbox checkbox-switchery">
                                        <label>
                                            <input type="checkbox" class="switchery-primary" checked="checked">
                                            Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="text-right form-group">
                                    <button type="submit" class="btn btn-primary">Save Category <i class="icon-arrow-right14 position-right"></i></button>
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
