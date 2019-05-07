<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Delivery Costing</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Weight (Kg):</label>
                                <input type="number" step="0.01" class="form-control" placeholder="Package Weight " required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Length (CM):</label>
                                <input type="number" step="0.01" class="form-control" placeholder="Length" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Width (CM):</label>
                                <input type="number" step="0.01" class="form-control" placeholder="Width" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Height (CM):</label>
                                <input type="number" step="0.01" class="form-control" placeholder="Height" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cost Price:</label>
                                <input type="number" step="0.01" class="form-control" placeholder="Cost" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <div class="content-group-lg mt-2">
                                <label>Publication Status:</label>
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" class="switchery-primary" checked="checked">
                                        Publish
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">

                        </div>
                    </div>
                    <div class="text-right form-group ">
                        <button type="submit" class="btn btn-success">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Delivery Cost List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Weight (KG)</th>
                        <th>Package Length (CM)</th>
                        <th>Package Width (CM)</th>
                        <th>Package Height (CM)</th>
                        <th class="text-right">Cost Price</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Eugene</td>
                        <td>Kopyov</td>
                        <td>@Kopyov</td>
                        <td>@Kopyov</td>
                        <td class="text-right">@Kopyov</td>
                        <td class="text-center">@Kopyov</td>
                        <td class="text-center">@Kopyov</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    export default {
        name: "DeliveryCost"
    }
</script>

<style scoped>

</style>
