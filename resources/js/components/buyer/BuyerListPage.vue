<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">Customer List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="form-inline" style="margin:1em;">
                                <div class="form-group">
                                    <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                                </div>
                            </div>

                            <div id="table">
                                <datatable class="table-bordered table-striped" :columns="columns" :data="buyerList" :filter-by="filter"></datatable>
                            </div>
                            <div class="form-inline">
                                <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import  Vue from 'vue'
    Vue.component('statusLevel', {
        template: `<div>
                        <span v-if="row.user.status == 1" class="badge badge-success">Active</span>
                        <span v-else-if="row.user.status == 2" class="badge badge-danger">Block</span>
                        <span v-else-if="row.user.status == 3" class="badge badge-warning">Un-Verified</span>
                        <span v-else class="badge badge-default">Undefined</span>
                    </div>`,
        props: ['row'],
    });

    Vue.component('account-status', {
        template: `<div>
                        <span v-if="row.user.is_seller == 1" class="badge badge-success">Yes</span>
                        <span v-else-if="row.user.is_seller == 0" class="badge badge-danger">No</span>
                        <span v-else class="badge badge-default">Undefined</span>
                    </div>`,
        props: ['row'],
    });

    Vue.component('buyer-action', {
        template: `<ul class="icons-list">
                        <li><a href="#" class="label label-primary text text-white" @click.prevent="goToDetailsPage(row.buyer_id)"><i class="icon-eye"></i></a></li>
                        <li v-if="row.user.status != 2"><a href="#" class="label label-warning text text-white" @click.prevent="blockBuyer(row.buyer_id)"><i class="icon-user-block "></i></a></li>
                        <li v-else><a href="#" class="label label-info text text-white" @click.prevent="unblockBuyer(row.buyer_id)"><i class=" icon-user-check"></i></a></li>
                        <li><a href="#" class="label label-danger text text-white" @click.prevent="deleteBuyer(row.buyer_id)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods: {
            ...mapActions([
                'buyerStatusChange',
                'buyerDelete'
            ]),
            goToDetailsPage: function(ID){
                window.location = '/admin/buyer/'+ID;
            },

            unblockBuyer(ID){
                let reqData={
                    Id:ID,
                    status:1,
                };
                this.buyerStatusChange(reqData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
            blockBuyer(ID){
                let reqData={
                    Id:ID,
                    status:2,
                };
                this.buyerStatusChange(reqData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
            deleteBuyer(Id){
                this.buyerDelete(Id)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }

        },
    });

    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "BuyerListPage",
        data(){
            return{
                page: 1,
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: 'Full Name', field: 'user.full_name', sortable: true},
                    { label: 'User Name', field: 'user.user_name',},
                    { label: 'Email', field: 'user.email'},
                    { label: 'Contact No', field: 'user.phone_no', sortable: false },
                    { label: 'Is Seller', component: 'account-status', align: 'center', sortable: true },
                    { label: 'Status', component: 'statusLevel', align: 'center', sortable: true },
                    { label: 'Action', component: 'buyer-action', align: 'center', sortable: false },

                ],
                reqData:{},
            }
        },
        created(){

        },
        mounted(){
            this.getBuyerList(this.reqData);
        },
        methods:{
            ...mapActions([
                'getBuyerList',
            ])
        },
        computed:{
            ...mapGetters([
                'buyerList',
                'paginate'
            ])
        }
    }
</script>

<style scoped>

</style>
