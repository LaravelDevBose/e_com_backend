<template>
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Product Size Group List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-xs-12 form-inline" style="margin:1em;">
                        <div class="form-group">
                            <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="table" class="col-xs-12 table-responsive">
                        <datatable class="table-bordered table-striped" :columns="columns" :data="buyerList" :filter-by="filter"></datatable>
                    </div>
                </div>

                <div class="col-xs-12 form-inline">
                    <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
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

    Vue.component('action-btn', {
        template: `<ul class="icons-list">
                        <li><a href="#" class="text text-primary-700" @click.prevent="goToDetailsPage(row.buyer_id)"><i class="icon-eye"></i></a></li>
                        <li v-if="row.buyer_status != 2"><a href="#" class="text text-info" @click.prevent="blockBuyer(row.buyer_id)"><i class=" icon-user-block"></i></a></li>
                        <li v-else><a href="#" class="text text-info" @click.prevent="unblockBuyer(row.buyer_id)"><i class="icon-user-check"></i></a></li>
                        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.buyer_id)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods: {
            ...mapActions([
                'buyerBlock'
            ]),
            goToDetailsPage: function(ID){
                window.location = '/admin/buyer/'+ID;
            },

            unblockBuyer(Id){
                this.buyerBlock(id)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
            blockBuyer(Id){
                this.buyerBlock(id)
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
                    { label: '#', field: 'index', align: 'center', filterable: false, sortable:false },
                    { label: 'Full Name', field: 'user.full_name', sortable: true},
                    { label: 'User Name', field: 'user.user_name',},
                    { label: 'Email', field: 'user.email'},
                    { label: 'Contact No', field: 'user.phone_no', sortable: false },
                    { label: 'Is Seller', component: 'account-status', align: 'center', sortable: true },
                    { label: 'Status', component: 'statusLevel', align: 'center', sortable: true },
                    // { label: 'Action', component: 'action-btn', align: 'center', sortable: false },

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
