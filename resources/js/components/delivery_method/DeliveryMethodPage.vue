<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Delivery Method</h5>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="manipulateDeliveryMethodData">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Delivery Title: <span class="text text-bold text-danger">*</span></label>
                                <input type="text" v-model="formData.delivery_title" class="form-control" placeholder="Delivery Method Title" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Min. Day(s): <span class="text text-bold text-danger">*</span></label>
                                <input type="number" v-model="formData.min_time" class="form-control" placeholder="Min. Day(s)" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Max. Day(s): <span class="text text-bold text-danger">*</span></label>
                                <input type="number" v-model="formData.max_time" class="form-control" placeholder="Max. Day(s)" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Delivery Change: <span class="text text-bold text-danger">*</span></label>
                                <input type="number" v-model="formData.cost_price" class="form-control" placeholder="Delivery Charge" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Delivery Status:</label>
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success" v-if="formData.delivery_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="paypal_payment" v-model="formData.delivery_status"  :checked="formData.delivery_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success">
                                    <span v-if="isedit">Update Method</span>
                                    <span v-else>Save Method</span>
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
                <h5 class="panel-title">Delivery Method List</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Delivery Title</th>
                        <th>Min. Day(s)</th>
                        <th>Max. Day(s)</th>
                        <th>Delivery charge</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="deliveryMethods" v-for="(method , index) in deliveryMethods" :key="method.id">
                        <td>{{ index +1 }}</td>
                        <td>
                            <span class="text text-bold"> {{ method.title }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ method.min_days }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ method.max_days }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ method.charge }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="method.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#" @click.prevent="editDeliveryMethod(method.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="deliveryMethodDelete(method.id)"><i class="icon-trash"></i></a></li>
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
    import {mapGetters, mapActions} from  'vuex';
    export default {
        name: "DeliveryMethodPage",
        data(){
            return{
                formData:{
                    id:'',
                    delivery_title:'',
                    min_time:'',
                    max_time:'',
                    cost_price:'',
                    delivery_status:'',
                },
                btnDisabled:false,
                isedit:false,
            }
        },
        created() {
            this.getDeliveryMethodList();
        },
        methods:{
            ...mapActions([
                'getDeliveryMethodList',
                'storeDeliveryMethod',
                'updateDeliveryMethodInfo',
                'deleteDeliveryMethod',
            ]),
            manipulateDeliveryMethodData(){
                if(this.isedit === true){
                    this.updateDeliveryMethodInfo(this.formData)
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
                    this.storeDeliveryMethod(this.formData)
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
                this.formData.delivery_title='';
                this.formData.min_time='';
                this.formData.max_time = '';
                this.formData.cost_price='';
                this.formData.delivery_status = false;
            },
            deliveryMethodDelete(deliveryId){
                if(confirm('Are You Sure..?')){
                    this.deleteDeliveryMethod(deliveryId)
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
            editDeliveryMethod(deliveryId){

                this.deliveryMethods.filter(delivery=>{
                    if(delivery.id === deliveryId){
                        this.isedit = true;
                        this.formData.id=delivery.id;
                        this.formData.delivery_title=delivery.title;
                        this.formData.min_time=delivery.min_days;
                        this.formData.max_time =delivery.max_days;
                        this.formData.cost_price=delivery.charge;
                        this.formData.delivery_status = delivery.status;
                    }
                    return delivery;
                })
            }

        },
        computed:{
            ...mapGetters([
                'deliveryMethods',
            ]),
            checkFormData(){
                return JSON.parse(JSON.stringify(this.formData))
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
        }
    }
</script>

<style scoped>

</style>
