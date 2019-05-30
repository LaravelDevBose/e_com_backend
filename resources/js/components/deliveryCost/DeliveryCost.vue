<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Delivery Costing</h5>
                <div class="heading-elements">
                    <button type="button" class="btn bg-orange-800 btn-sm" data-toggle="modal" data-target="#modal_import_file">Bulk Import <i class="icon-play3 position-right"></i></button>
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="deliveryCostStore">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Package Title:</label>
                                <input type="text" v-model="form.cost_title" class="form-control" placeholder="Package Title " required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Delivery Area:</label>
                                <vue-select2 :options="deliveryAreas" v-model.number="form.delivery_area" >
                                </vue-select2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cost Price:</label>
                                <input type="number" v-model="form.cost_price" step="0.01" class="form-control" placeholder="Cost in (tk)" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Weight (Kg):</label>
                                <input type="number" v-model="form.package_weight" step="0.01" class="form-control" placeholder="Package Weight " required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Length (CM):</label>
                                <input type="number" v-model="form.package_length" step="0.01" class="form-control" placeholder="Length" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Width (CM):</label>
                                <input type="number" v-model="form.package_width" step="0.01" class="form-control" placeholder="Width" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Height (CM):</label>
                                <input type="number" v-model="form.package_height" step="0.01" class="form-control" placeholder="Height" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="content-group-lg mt-2">
                                <label>Publication Status:</label>
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" v-model="form.cost_status" class="switchery-primary" :checked="form.cost_status">
                                        <span class="text-success text-bold" v-if="form.cost_status">Enable</span>
                                        <span class="text-danger text-bold" v-else>Disable</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right form-group ">
                        <button type="submit" :disabled="btnDisabled" class="btn btn-success">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
                        <th>Package Name</th>
                        <th>Delivery Area</th>
                        <th>Package Weight (KG)</th>
                        <th>Package Dimension (CM)</th>
                        <th class="text-right">Cost Price</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="deliveryCosts" v-for="(cost,index) in deliveryCosts" :key="cost.id">
                        <td>{{ index }}</td>
                        <td>{{ cost.title }}</td>
                        <td>{{ cost.area }}</td>
                        <td>{{ cost.weight }}</td>
                        <td>{{ cost.height }} X {{ cost.width }} X {{ cost.length }}</td>
                        <td class="text-right">{{ cost.price }}</td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="cost.status === 1">Enable</span>
                            <span class="badge badge-warning" v-else>Disable</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeDeliveryCost(cost.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
        <import-data :example_image="format_image" :upload_url="action_url" :example_file="format_file" ></import-data>
    </div>
</template>

<script>
    import VueSelect2 from '../helper/Select2';
    import {mapGetters, mapActions} from 'vuex';
    import ImportData from "../helper/ImportData";

    export default {
        name: "DeliveryCost",
        components:{
            'vue-select2':VueSelect2,
            'import-data':ImportData
        },
        data(){
            return {
                btnDisabled:false,
                form:{
                    cost_title:'',
                    package_weight:'',
                    package_length:'',
                    package_width:'',
                    package_height:'',
                    cost_price:'',
                    cost_status:0,
                    delivery_area:1,
                },
                format_image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
                action_url:'/admin/import/delivery_cost',
                format_file:'http://e_com.pc/excel_demo/delivery_cost.xlsx',
            }
        },
        created() {
            this.getDeliveryCost();

        },
        computed:{
            ...mapGetters([
                'deliveryAreas',
                'deliveryCosts',
            ])
        },
        methods:{
            ...mapActions([
                'getDeliveryCost',
                'storeDeliveryCost',
                'deleteDeliveryCost',
            ]),
            deliveryCostStore(){
                //#TODO Validation Check
                this.btnDisabled = true;
                this.storeDeliveryCost(this.form)
                    .then(response=>{
                        if(response.status === "success"){
                            Notify.success(response.message);
                            this.formReset();
                        }else{
                            Notify.error(response.message);
                        }
                    })

            },
            formReset(){
                this.form.cost_title = '';
                this.form.package_weight = '';
                this.form.package_length = '';
                this.form.package_width = '';
                this.form.package_height = '';
                this.form.cost_price = '';
                this.form.cost_status = 0;
                this.form.delivery_area = 1;

            },
            removeDeliveryCost(costId){
                if(confirm('Are You Sure..??')){
                    this.deleteDeliveryCost(costId)
                        .then(response=>{
                            if(response.status === "success"){
                                Notify.success(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        }).catch(error=>{
                            Notify.error(error.message);
                    })
                }
            }

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
        }
    }
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
