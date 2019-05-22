<template>
    <div class="CreateCampaign">
        <div class="content">
            <form action="" @submit.prevent="campaignStore">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Campaign Details</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Campaign Name:</label>
                                    <input type="text" class="form-control" v-model="form.campaign_title"  placeholder="Campaign name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Start Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour
                                                v-model="form.campaign_start"
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
                                                v-model="form.campaign_end"
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
                                <div class="form-group hidden">
                                    <label>Last Register Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour
                                                v-model="form.camp_reg_date"
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
                                    <label>Voucher Code:</label>
                                    <textarea v-model="form.campaign_details"  rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Voucher Image:</label>
                                <attachment :multi_file="multiple" :folder="folder"></attachment>
                            </div>
                            <div class="col-md-2">
                                <button type="button" @click.prevent="campaignProduct" class="btn bg-teal-400 btn-labeled legitRipple btn-block"><b><i class="icon-plus3"></i></b> Add Products</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel" v-show="productPanel">
                    <div class="panel-heading bg-teal-700">
                        <h5 class="panel-title">Add Campaign Products</h5>
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
                                                <input type="checkbox" v-model="form.campaign_status" class="switchery-primary" :checked="form.campaign_status">
                                                <span class="text-success text-bold" v-if="form.campaign_status">Active</span>
                                                <span class="text-danger text-bold" v-else>Inactive</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">Save Campaign <i class="icon-arrow-right14 position-right"></i></button>
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
    import ProductList from '../helper/ProductList';
    export default {
        name: "CreateCampaign",
        components:{
            Attachment,
            'product-list':ProductList,
        },
        data(){
            return {
                form:{
                    campaign_title:'',
                    campaign_start:new Date().toISOString().slice(0,10),
                    campaign_end:new Date().toISOString().slice(0,10),
                    campaign_details:'',
                    attachment_id:'',
                    campaign_status:0,
                    camp_reg_date:'',
                    productIDs:[],
                },
                btnDisabled:false,
                productPanel:false,
                folder:'campaign',
                multiple:false,
            }
        },
        created() {

        },
        methods:{
            ...mapActions([
                'storeCampaign',
            ]),
            campaignStore(){

            },
            campaignProduct(){
                this.productPanel = !this.productPanel;
            }
        },
        computed:{
            ...mapGetters([

            ]),
        },
        watch:{
            form:{
                handler(newValue, oldValue){
                    if(newValue === oldValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            }
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