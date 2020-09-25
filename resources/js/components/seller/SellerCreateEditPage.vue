<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <span v-if="isedit">Update Seller Information</span>
                    <span v-else>Create New Seller Information</span>
                </h5>
                <div class="heading-elements">
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="manipulateSellerData">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <label>Seller Name: <span class="text text-bold text-danger">*</span></label>
                                <input type="text" v-model="formValue.seller_name" class="form-control" placeholder="Seller Name " required>
                            </div>
                            <div class="form-group">
                                <label>Seller Phone No.: <span class="text text-bold text-danger">*</span></label>
                                <input type="text" v-model="formValue.seller_phone" class="form-control" placeholder="Seller Phone No. " required>
                            </div>
                            <div class="form-group">
                                <label>Seller Address: <span class="text text-bold text-danger">*</span></label>
                                <input type="text" v-model="formValue.seller_address" class="form-control" placeholder="Seller Address " required>
                            </div>
                            <div class="form-group">
                                <label>Seller Email:</label>
                                <input type="text" v-model="formValue.seller_email" class="form-control" placeholder="Seller Email ">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Shop Name: <span class="text text-bold text-danger">*</span></label>
                                <input type="text" v-model="formValue.shop_name" class="form-control" placeholder="Shop Name " required>
                            </div>
                            <div class="form-group">
                                <label>Shop Phone No.:</label>
                                <input type="text" v-model="formValue.shop_phone" class="form-control" placeholder="Shop Phone No. ">
                            </div>
                            <div class="form-group">
                                <label>Shop Email:</label>
                                <input type="text" v-model="formValue.shop_email" class="form-control" placeholder="Shop Email " >
                            </div>
                            <div class="form-group">
                                <label>Shop Address:</label>
                                <input type="text" v-model="formValue.shop_address" class="form-control" placeholder="Shop Address ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-6">
                            <div class="form-group">
                                <label>Seller Status:</label>
                                <label class="checkbox-style" for="status">
                                    <span class="text-bold text-success" v-if="formValue.seller_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="status" v-model="formValue.seller_status" :checked="formValue.seller_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" :disabled="btnDisabled" style="margin-top: 2em;">
                                    <span v-if="isedit === 1">Update Seller </span>
                                    <span v-else>Save Seller </span>
                                    <i class="icon-arrow-right14 position-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions} from 'vuex'
    export default {
        name: "SellerCreateEditPage",
        props:{
            sellerid:{
                type:[Number,String],
                default:''
            },
            isedit:{
                type:[Number,Boolean],
                default: false,
            }
        },
        data(){
            return{
                formValue:{
                    id:'',
                    seller_name:'',
                    seller_phone:'',
                    seller_address:'',
                    shop_name:'',
                    seller_email:'',
                    shop_address:'',
                    shop_phone:'',
                    shop_email:'',
                    seller_status:'',
                    shop_category:'',
                },
                btnDisabled:false,
            }
        },
        mounted(){
            if(this.isedit){
                this.getSellerData(this.sellerid)
            }
        },
        methods:{
            ...mapActions([
                'storeSellerData',
                'updateSellerData',
                'getSellerData',
            ]),
            manipulateSellerData(){
                if(this.isedit){
                    this.updateSellerData(this.formValue).then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            if(response.hasOwnProperty('url')){
                                location.href = response.url;
                            }
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    });
                }else{
                    this.storeSellerData(this.formValue).then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 201){
                            Notify.success(response.message);
                            if(response.hasOwnProperty('url')){
                                location.href = response.url;
                            }
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    });
                }


            }
        },
        computed:{
            ...mapGetters([
                'sellerData'
            ]),
            sellerDataCheck(){
                return JSON.parse(JSON.stringify(this.sellerData));
            },
        },
        watch:{
            sellerDataCheck:{
                handler(newValue, oldValue){
                    if(newValue !==  oldValue){
                        console.log(this.sellerData);
                        this.formValue.id = this.sellerData.id;
                        this.formValue.seller_name = this.sellerData.name;
                        this.formValue.seller_phone = this.sellerData.phone;
                        this.formValue.seller_address = this.sellerData.address;
                        this.formValue.seller_email = this.sellerData.email;
                        this.formValue.shop_name = this.sellerData.shop_name;
                        this.formValue.shop_address = this.sellerData.shop_address;
                        this.formValue.shop_phone = this.sellerData.shop_phone;
                        this.formValue.shop_email = this.sellerData.shop_email;
                        this.formValue.shop_category = this.sellerData.shop_category;
                        if(this.sellerData.status === 1){
                            this.formValue.seller_status = true;
                        }
                    }
                },deep:true,
            }
        }
    }
</script>

<style scoped>

</style>
