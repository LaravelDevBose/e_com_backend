<template>
    <div class="CreateVoucher">
        <div class="content">
            <form action="" @submit.prevent="saveVoucher">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Voucher Details</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Voucher Name:</label>
                                    <input type="text" class="form-control" v-model="form.voucher_name" placeholder="Voucher name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Start Date:</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="text" v-model="form.start_date" class="form-control daterange-single" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" v-model="form.start_time" class="form-control pickatime" placeholder="Start time">
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
                                                <input type="text" v-model="form.end_date" class="form-control daterange-single" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" v-model="form.end_time" class="form-control pickatime" placeholder="Start time">
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
                                    <select class="select form-control" v-model="form.voucher_type" data-width="100%">
                                        <option value="">Select A Type</option>
                                        <option v-if="voucherTypes" v-for="(voucherType,index) in voucherTypes" :value="index" :selected="index===1">{{ voucherType }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group hidden">
                                    <label>Collect Start Time:</label>
                                    <div class="input-group">
                                        <input type="text"  class="form-control daterange-single" >
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Code:</label>
                                    <input type="text" v-model="form.voucher_code" class="form-control" placeholder="Voucher Code" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Voucher Image:</label>
                                <attachment :multi_file="multiple" :folder="folder"></attachment>
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
                                    <select class="select form-control"  @change.native="discountTypeChange" v-model="form.discount_type" data-width="100%">
                                        <option value="">Select A Type</option>
                                        <option v-if="discountTypes" v-for="(typeName,index) in discountTypes" :value="index">{{ typeName }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discount Value(off):</label>
                                    <input type="text" v-model="form.discount_value" class="form-control" placeholder="Discount Value" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Min Order Value:</label>
                                    <input type="text" v-model="form.min_order_value" class="form-control" placeholder="Minimum order value to apply voucher (BDT)" required>
                                </div>
                            </div>
                            <div class="col-md-3" :class="{hidden:maxValue}">
                                <div class="form-group">
                                    <label>Maximum Discount:</label>
                                    <input type="text" v-model="form.max_discount" class="form-control" placeholder="Maximum discount in (BDT)" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Voucher to be issued:</label>
                                    <input type="text" v-model="form.voucher_issued" class="form-control" placeholder="Total voucher to be issued" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>User Limit per Customer:</label>
                                    <input type="text" v-model="form.usage_limit" class="form-control" placeholder="User Limit per Customer " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apply To:</label>
                                    <select class="select form-control"  v-model="form.apply_to" data-width="100%">
                                        <option value="">Select A Type</option>
                                        <option v-if="applyTo" v-for="(apply, index) in applyTo" :value="index">{{ apply }}</option>
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
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">Save Voucher <i class="icon-arrow-right14 position-right"></i></button>
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

    import {mapGetters, mapActions} from 'vuex';
    import Attachment from "../attachment/Attachment";
    export default {
        name:'CreateVoucher',
        components: {Attachment},
        data(){
            return{
                form:{
                    voucher_name:'',
                    start_date: new Date().toISOString().slice(0,10),
                    start_time:'',
                    end_date:new Date().toISOString().slice(0,10),
                    end_time:'',
                    voucher_type:'',
                    voucher_code:'',
                    voucher_issued:'',
                    discount_type:'',
                    discount_value:'',
                    max_discount:'',
                    min_order_value:'',
                    usage_limit:'',
                    apply_to:'',
                    attachment_id:''
                },
                multiple:false,
                folder:'voucher',
                btnDisabled:false,
                maxValue:true,
            }
        },
        created() {
            this.getFormDate();
        },
        methods:{
            ...mapActions([
                'getFormDate',
                'storeVoucher',
            ]),
            discountTypeChange(){
                alert(this.form.discount_type);
                if(this.form.discount_type === 2){
                    this.maxValue = false;
                }else{
                    this.maxValue = false;
                }

            },
            saveVoucher(){

            },
            validation(){

            },
            resetData(){

            },

        },
        computed:{
            ...mapGetters([
                'applyTo',
                'voucherTypes',
                'discountTypes',
                'attachment_ids'
            ]),

        },
        watch:{
            form:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
        }
    };
</script>

<style scoped>
    .sticky-submit-btn{
        position: -webkit-sticky;
        position: sticky;
        bottom: 50px;
    }
</style>
