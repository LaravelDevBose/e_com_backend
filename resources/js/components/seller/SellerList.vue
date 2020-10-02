<template>
    <div class="content">
        <!-- Basic table -->
        <div class="panel">
            <div class="panel-heading bg-slate">
                <h5 class="panel-title">Seller List</h5>
                <div class="heading-elements">
                    <div class="heading-elements">
                        <a href="/admin/seller/create" class="btn btn-success btn-sm btn-inline"><i class="icon-plus-circle2 text-left"></i> Add New Seller</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="form-inline" style="margin:1em;">
                            <div class="form-group">
                                <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                            </div>
                        </div>

                        <div id="table">
                            <datatable class="table-bordered table-striped" :columns="columns" :data="sellerList" :filter-by="filter"></datatable>
                        </div>
                        <div class="form-inline" style="margin:1em; float:right;">
                            <div class="form-group">
                                <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    import Vue from 'vue';
    import { mapGetters, mapActions} from 'vuex';
    Vue.component('seller-status', {
        template: `
            <span class="badge badge-success" v-if="row.status === 1">Active</span>
            <span class="badge badge-warning" v-else>De-active</span>
        `,
        props: ['row']
    });
    Vue.component('seller-action', {
        template: `<ul class="icons-list">
                        <li class="text-primary-600"><a href="#" @click.prevent="goToEditPage(row.id)"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a href="#" @click.prevent="deleteSellerData(row.id)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods:{
            ...mapActions([
                'deleteSeller',
            ]),
            deleteSellerData(id){
                if(confirm('Are Your Sure..?')){
                    this.deleteSeller(id).then(response=>{
                        if(response.status === 'success'){
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
                location.href = `/admin/seller/${Id}/edit`
            }
        }
    });

    export default {
        name: "SellerList",
        data(){
            return{
                laravelData:{},
                page: 1,
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: 'Seller Name', field: 'name' },
                    { label: 'Phone No', field: 'phone'},
                    { label: 'Email', field: 'email'},
                    { label: 'Address', field: 'address', sortable: false },
                    { label: 'Shop Name', field: 'shop_name', sortable: false },
                    { label: 'Shop Phone', field: 'shop_phone', sortable: false },
                    { label: 'Shop Address', field: 'shop_address', sortable: false },
                    { label: 'Shop Email', field: 'shop_email', sortable: false },
                    { label: 'Status', component: 'seller-status', align: 'center', sortable: false },
                    { label: 'Action', component: 'seller-action', align: 'center', sortable: false },

                ],
            }
        },
        created(){
            this.getSellerList();
        },
        methods:{
            ...mapActions([
                'getSellerList',
            ]),
            getResults(page = 1) {
                axios.get('example/results?page=' + page)
                    .then(response => {
                        this.laravelData = response.data;
                    });
            }
        },
        computed:{
            ...mapGetters([
                'sellerList',

            ]),
        }
    }
</script>

<style scoped>

</style>
