<template>
    <div class="content">
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
                    <button type="button" class="btn btn-sm btn-info" @click="voucher_create_url()"> <i class="icon-plus-circle2 text-left"></i> Add Voucher</button>
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
        name: "Voucher",

        methods:{
            voucher_create_url:()=>{
                window.location='/admin/voucher/create';
            }
        }
    }
</script>

<style scoped>

</style>
