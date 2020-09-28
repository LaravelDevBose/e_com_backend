<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <span v-if="isedit">Update Coupon</span>
                    <span v-else>Add New Coupon</span>
                </h5>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="manipulateBrandData">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Coupon Title: <span class="text text-danger text-bold">*</span></label>
                                <input type="text" v-model="formData.coupon_title" class="form-control" placeholder="Coupon Title " required>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Coupon Code: <span class="text text-danger text-bold">*</span></label>
                                <input type="text" v-model="formData.coupon_code" class="form-control" placeholder="Coupon Code " required>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Coupon Amount: <span class="text text-danger text-bold">*</span></label>
                                <input type="number" v-model="formData.coupon_amount" class="form-control" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Min. Order Amount:</label>
                                <input type="number" v-model="formData.min_order" class="form-control" placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Coupon Quantity:</label>
                                <input type="number" v-model="formData.coupon_qty" class="form-control" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Expire At:</label>
                                <datetime
                                    type="datetime"
                                    use12-hour
                                    v-model="formData.expire_at"
                                    input-id="expire_time"
                                    input-class="form-control"
                                    :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                    :week-start="6"
                                >
                                </datetime>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Banner:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Coupon Status:</label>
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success" v-if="formData.coupon_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="paypal_payment" v-model="formData.coupon_status"  :checked="formData.coupon_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-10">
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block">
                                    <span v-if="isedit">Update Coupon</span>
                                    <span v-else>Save Coupon</span>
                                    <i class="icon-arrow-right14 position-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Coupon List</h5>
            </div>

            <div class="table-responsive">
                <div class="table-responsive">
                    <div class="form-inline" style="margin:1em;">
                        <div class="form-group">
                            <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                        </div>
                    </div>

                    <div id="table">
                        <datatable class="table-bordered table-striped" :columns="columns" :data="couponCodes" :filter-by="filter"></datatable>
                    </div>
                    <div class="form-inline" style="margin:1em; float:right;">
                        <div class="form-group">
                            <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from  'vuex';
    import ImageCropper from "../cropper/ImageCropper";
    import Vue from "vue";
    Vue.component('banner', {
        template: `<img v-if="row.attachment" :src="row.attachment.image_path" :alt="row.title" class="img-preview img-thumbnail"  >`,
        props: ['row']
    });
    Vue.component('coupon-status', {
        template: `
            <span class="badge badge-info" v-if="row.is_live && row.status === 1">Live</span>
            <span class="badge badge-success" v-else-if="!row.is_live && row.status === 1">Active</span>
            <span class="badge badge-warning" v-else>Inactive</span>
        `,
        props: ['row']
    });
    Vue.component('coupon-action', {
        template: `<ul class="icons-list">
                        <li class="text-primary-600"><a href="#" @click.prevent="goToEditPage(row.id)"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a href="#" @click.prevent="couponDelete(row.id)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods:{
            ...mapActions([
                'deleteCouponCode',
                'editCouponCode'
            ]),
            couponDelete(couponId){
                if(confirm('Are You Sure..?')){
                    this.deleteCouponCode(couponId)
                        .then(response=>{
                            if(response.status === "success"){
                                Notify.success(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                }else{
                    return false;
                }
            },
            goToEditPage(Id){
                this.editCouponCode(Id);
            }
        }
    });

    export default {
        name: "CouponCode",
        components: {ImageCropper},
        data(){
            return{
                formData:{
                    id:'',
                    coupon_title:'',
                    coupon_code:'',
                    coupon_amount:'',
                    min_order:'',
                    coupon_qty:'',
                    expire_at:'',
                    attachment_id:'',
                    coupon_status:'',
                },
                cropperData:{
                    width:200,
                    height:200,
                    placeholder:'Choose a image in 200X200',
                    file_size:1,
                    init_image:'',
                    folder:'coupon',
                    modal_type:1,
                },
                removeImage:false,
                btnDisabled:false,
                isedit:false,

                page: 1,
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: 'Image', component: 'banner', align: 'center', sortable: false },
                    { label: 'Coupon Title', field: 'title',  },
                    { label: 'Coupon Code', field: 'code', align: 'center', },
                    { label: 'Coupon Amount', field: 'amount', align: 'center', },
                    { label: 'Min Order', field: 'min_order', align: 'center', },
                    { label: 'Quantity', field: 'qty', align: 'center', },
                    { label: 'Expire', field: 'expire', align: 'center', },
                    { label: 'Status', component: 'coupon-status', align: 'center', sortable: false },
                    { label: 'Action', component: 'coupon-action', align: 'center', sortable: false },

                ],
            }
        },
        created() {
            this.getCouponCodes();
        },
        methods:{
            ...mapActions([
                'getCouponCodes',
                'storeCouponCode',
                'updateCouponInfo',
            ]),
            manipulateBrandData(){
                if(this.cropImageIds.length !== 0 && this.cropImageIds[0] !== ''){
                    this.formData.attachment_id = this.cropImageIds[0];
                }
                if(this.isedit){
                    this.updateCouponInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                Notify.success(response.message);
                                this.isedit = false;
                                this.formReset();
                            }else if(response.status === "validation"){
                                Notify.validation(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                        .catch(error=>{
                            Notify.info(error.message);
                        })
                }else{
                    this.storeCouponCode(this.formData)
                        .then(response=>{
                            console.log(response);
                            if(response.status === "success"){
                                Notify.success(response.message);
                                this.formReset();
                            }else if(response.status === "validation"){
                                Notify.validation(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                        .catch(error=>{
                            Notify.info(error.message);
                        })
                }

            },
            formReset(){
                this.formData.coupon_title='';
                this.formData.coupon_code='';
                this.formData.coupon_amount=1;
                this.formData.min_order='';
                this.formData.coupon_qty='';
                this.formData.expire_at='';
                this.formData.coupon_status = false;
                this.formData.attachment_id = '';
                this.removeImage=true;
            },

            editCouponCode(couponId){

                this.couponCodes.filter(couponCode=>{
                    if(couponCode.id === couponId){
                        this.isedit = true;
                        this.formData.id=couponCode.id;
                        this.formData.coupon_title=couponCode.title;
                        this.formData.coupon_code=couponCode.code;
                        this.formData.coupon_amount=couponCode.amount;
                        this.formData.min_order=couponCode.min_order;
                        this.formData.coupon_qty=couponCode.qty;
                        this.formData.expire_at = couponCode.expire;
                        if (couponCode.status === 1){
                            this.formData.coupon_status = true;
                        }else{
                            this.formData.coupon_status = false;
                        }

                        if(couponCode.attachment){
                            this.formData.attachment_id = couponCode.attachment.attachment_id;
                            this.cropperData.init_image = couponCode.attachment.image_path;
                        }
                    }
                    return couponCode;
                })
            }

        },
        computed:{
            ...mapGetters([
                'couponCodes',
                'cropImageIds',
                'editCouponCodeId'
            ]),
            checkFormData(){
                return JSON.parse(JSON.stringify(this.formData))
            },
            checkEditId(){
                return JSON.parse(JSON.stringify(this.editCouponCodeId))
            }
        },
        watch:{
            checkFormData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            checkEditId:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.editCouponCode(this.editCouponCodeId);
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
