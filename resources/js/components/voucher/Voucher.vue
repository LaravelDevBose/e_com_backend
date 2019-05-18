<template>
    <div class="content">
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Voucher List</h5>
                <div class="heading-elements">
                    <button type="button" class="btn btn-sm btn-info" @click="voucher_create_url()"> <i class="icon-plus-circle2 text-left"></i> Add Voucher</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Banner</th>
                        <th>Voucher Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Voucher Code</th>
                        <th class="text-center">Discount Type</th>
                        <th class="text-center">Apply In</th>
                        <th class="text-right">Discount Value</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="vouchers" v-for="(voucher, index) in vouchers" :key="voucher.id">
                        <td>{{ index }}</td>
                        <td class="text-center" style="width: 70px">
                            <img v-if="voucher.voucher_image !== null " :src="voucher.voucher_image.image_path" height="60" class="" alt="">
                        </td>
                        <td>{{ voucher.title }}</td>
                        <td>{{ voucher.start_date }}</td>
                        <td>{{ voucher.end_date }}</td>
                        <td>{{ voucher.code }}</td>
                        <td class="text-center">{{ voucher.discount_type }}</td>
                        <td class="text-center">{{ voucher.use_in }}</td>
                        <td class="text-right">{{ voucher.discount_amount }}</td>
                        <td class="text-center">
                            <span class="badge badge-success" v-if="voucher.status === 1">{{ voucher.voucher_status }}</span>
                            <span class="badge badge-warning" v-else>{{ voucher.voucher_status }}</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeVoucher(voucher.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "Voucher",
        created(){
            this.getVoucherList();
        },
        methods:{
            ...mapActions([
                'getVoucherList',
                'voucherDelete'
            ]),
            voucher_create_url:()=>{
                window.location='/admin/voucher/create';
            },
            removeVoucher(voucherID){
                if(confirm('Are You Sure..??')){
                    this.voucherDelete(voucherID).then(response=>{

                        if(response.status === 'success'){
                            alert(response.message);
                        }
                    })
                }else{
                    return false;
                }
            }
        },
        computed:{
            ...mapGetters([
                'vouchers'
            ])
        }
    }
</script>

<style scoped>

</style>
