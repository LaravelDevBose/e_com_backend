<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">Customer List</h5>
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
                        <span v-if="row.status == 1" class="badge badge-success">Active</span>
                        <span v-else-if="row.status == 2" class="badge badge-danger">Block</span>
                        <span v-else-if="row.status == 3" class="badge badge-warning">Un-Verified</span>
                        <span v-else class="badge badge-default">Undefined</span>
                    </div>`,
        props: ['row'],
    });
    Vue.component('totalOrder', {
        template: `{{ total_order}}`,
        props: ['row'],
        data() {
            return{
                total_order:0,
            }
        },
        mounted() {
            this.total_order = this.row.orders.length;
            console.log(this.total_order);
        }
    });

    Vue.component('buyer-action', {
        template: `<ul class="icons-list">
<!--                        <li><a href="#" class="text text-primary" @click.prevent="goToDetailsPage(row.buyer_id)"><i class="icon-eye"></i></a></li>-->
                        <li v-if="row.status != 2"><a href="#" class="text text-warning" @click.prevent="blockBuyer(row.user_id)"><i class="icon-user-block "></i></a></li>
                        <li v-else><a href="#" class="text text-info" @click.prevent="unblockBuyer(row.user_id)"><i class=" icon-user-check"></i></a></li>
                        <li><a href="#" class="text text-danger" @click.prevent="deleteBuyer(row.user_id)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods: {
            ...mapActions([
                'buyerStatusChange',
                'buyerDelete'
            ]),
            goToDetailsPage: function(ID){
                window.location = `/admin/buyer/${ID}/show`;
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
                let conf = confirm('Are You Sure. Want to Delete.?');
                if(!conf){
                    return false;
                }
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
                    { label: 'Full Name', field: 'full_name', sortable: true},
                    { label: 'Email', field: 'email', sortable: false},
                    { label: 'Contact No', field: 'phone_no', sortable: false },
                    { label: 'address', field: 'address', sortable: false},
                    { label: 'Total Order', field: 'totalOrder',},
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
