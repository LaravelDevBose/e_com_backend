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
                                    <input type="text" class="form-control" v-model="form.voucher_name"  placeholder="Voucher name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Start Date:</label>
                                    <div class="input-group">

                                        <datetime
                                            type="datetime"
                                            use12-hour
                                            v-model="form.voucher_start"
                                            input-id="startDate"
                                            input-class="form-control"
                                            :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                            :week-start="6"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>End Date:</label>
                                    <div class="input-group">

                                        <datetime
                                            type="datetime"
                                            use12-hour
                                            v-model="form.voucher_end"
                                            input-id="startDate"
                                            input-class="form-control"
                                            :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                            :week-start="6"
                                            class="theme-orange"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Type:</label>
                                    <vue-select2 :options="voucherTypes" v-model.number="form.voucher_type" >
                                    </vue-select2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group hidden">
                                    <label>Collect Start Time:</label>
                                    <div class="input-group">

                                        <datetime
                                            type="datetime"
                                            use12-hour
                                            v-model="form.collect_start"
                                            input-id="startDate"
                                            input-class="form-control"
                                            :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                            :week-start="6"
                                            class="theme-orange"
                                        >
                                        </datetime>
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5 class="panel-title">Voucher Setting</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discount Type:</label>
                                    <vue-select2 :options="discountTypes" v-model.number="form.discount_type" >
                                    </vue-select2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discount Value(off):</label>
                                    <input type="number" v-model="form.discount_value" class="form-control" placeholder="Discount Value" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Min Order Value:</label>
                                    <input type="number" v-model="form.min_order_value" class="form-control" placeholder="Minimum order value to apply voucher (BDT)" required>
                                </div>
                            </div>
                            <div class="col-md-3" v-if="maxValue">
                                <div class="form-group">
                                    <label>Maximum Discount:</label>
                                    <input type="number" v-model="form.max_discount" class="form-control" placeholder="Maximum discount in (BDT)" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Voucher to be issued:</label>
                                    <input type="number" v-model="form.voucher_issued" class="form-control" placeholder="Total voucher to be issued" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>User Limit per Customer:</label>
                                    <input type="number" v-model="form.usage_limit" class="form-control" placeholder="User Limit per Customer " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apply To:</label>
                                    <vue-select2 :options="applyTo" v-model.number="form.apply_to" >
                                    </vue-select2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel" v-show="addProductPanel">
                    <div class="panel-heading bg-teal-700">
                        <h5 class="panel-title">Voucher Setting</h5>
                    </div>

                    <div class="panel-body">
                        <product-list></product-list>
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
                                                <input type="checkbox" v-model="form.voucher_status" class="switchery-primary" checked="checked">
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
    import VueSelect2 from '../helper/Select2';
    import ProductList from '../helper/ProductList';

    export default {
        name:'CreateVoucher',
        components: {
            Attachment,
            'vue-select2':VueSelect2,
            'product-list':ProductList,

        },
        data(){
            return{
                form:{
                    voucher_name:'',
                    voucher_start: new Date().toISOString().slice(0,10),
                    voucher_end:new Date().toISOString().slice(0,10),
                    voucher_type:1,
                    voucher_code:'',
                    voucher_issued:'',
                    discount_type:1,
                    discount_value:'',
                    max_discount:'',
                    min_order_value:'',
                    usage_limit:'',
                    apply_to:1,
                    attachment_id:'',
                    collect_start:'',
                    voucher_status:0,
                    productIds:[],
                },
                multiple:false,
                folder:'voucher',
                btnDisabled:false,
                maxValue:false,
                addProductPanel:false,
            }
        },
        created() {
            this.getFormDate();
        },
        methods:{
            ...mapActions([
                'getFormDate',
                'storeVoucher',
                'addedProducts'
            ]),

            saveVoucher(){
                // #TODO check Validation
                this.form.attachment_id = this.attachment_ids;
                // change btnDisabled
                this.btnDisabled = true;
                //submit the form

                //check apply to option
                if(this.form.apply_to === 2){
                    if(this.selectedProductIDs === '' || this.selectedProductIDs.length === 0){
                        alert('Select Product SKU');
                        return false;
                    }
                    this.form.productIds = this.selectedProductIDs;
                }else{
                    this.form.productIds = [];
                    this.addedProducts([]);
                }
                this.storeVoucher(this.form)
                    .then(response=>{
                        if(response.status === 'success'){
                            // reset form data
                            alert('Voucher Store Success');
                            window.location = response.url;
                        }
                    })


            },
            validation(){

            },
            resetData(){
                this.form.reset();
            },

        },
        computed:{
            ...mapGetters([
                'applyTo',
                'voucherTypes',
                'discountTypes',
                'attachment_ids',
                'selectedProductIDs'
            ]),

        },
        watch:{
            form:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            'form.discount_type':{
                handler(newValue){
                    if(newValue === 2){
                        this.maxValue = true;
                    }else{
                        this.maxValue= false;
                    }
                },
                deep:true,
            },
            'form.apply_to':{
                handler(newValue){
                    if(newValue === 2){
                        this.addProductPanel = true;
                    }else{
                        this.addProductPanel = false;
                    }
                },
                deep:true,
            }
        }
    };
</script>

<style scoped>
    .sticky-submit-btn{
        position: -webkit-sticky;
        position: sticky;
        bottom: 50px;
    }
    .input-group-addon{
        border-color: #dddddd;
        padding:10px;
    }
</style>
