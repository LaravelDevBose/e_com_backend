<template>
    <div class="CreateVoucher">
        <div class="content">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5 class="panel-title">Category</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Category:</label>
                                <treeselect v-model="value" :options="categories" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name:</label>
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
        </div>
    </div>
</template>

<script>
    export default {
        props: {
        },
    };
</script>
