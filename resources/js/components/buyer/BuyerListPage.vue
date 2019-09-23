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
                        <datatable class="table-bordered table-striped" :columns="columns" :data="orders" :filter-by="filter"></datatable>
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
                        <span v-if="row.status == 1" class="badge badge-success">{{ row.status_label }}</span>
                        <span v-else-if="row.status == 2" class="badge badge-warning">{{ row.status_label }}</span>
                        <span v-else class="badge badge-default">{{ row.status_label }}</span>
                    </div>`,
        props: ['row'],
    });

    Vue.component('action-btn', {
        template: `<ul class="icons-list">
                        <li><a href="#" class="text text-primary-700" @click.prevent="goToDetailsPage(row.id)"><i class="icon-eye"></i></a :href=""></li>
                        <li><a href="#" class="text text-info" @click.prevent="goToEditPage(row.id)"><i class="icon-pencil7"></i></a></li>
                        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.id)"><i class="icon-trash"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle text text-teal-600" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon-cog7"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to CSV</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to DOC</a></li>
                            </ul>
                        </li>
                    </ul>`,
        props: ['row'],
        methods: {
            goToDetailsPage: function(ID){
                window.location = '/admin/product/'+ID;
            },
            goToEditPage:function (ID) {
                window.location = '/admin/product/'+ID+'/edit';
            },

        },
    });

    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "BuyerListPage",
        data(){
            return{
                page: 1,
                per_page: 10,
                buyers:'',
                filter: '',
                rows:'',
                columns: [
                    { label: '#', field: 'index', align: 'center', filterable: false, sortable:false },
                    { label: 'Image', component: 'thumb-image', align: 'center', sortable: false },
                    { label: 'Product Name', field: 'product_title',  },
                    { label: 'Product SKU', field: 'sku' , },
                    { label: 'Category', field: 'category.name' },
                    { label: 'Brand', field: 'brand.name', sortable: true },
                    { label: 'Quantity', field: 'total_qty', align: 'center', sortable: true },
                    { label: 'Status', component: 'select-row', align: 'center', sortable: false },
                    { label: 'Action', component: 'action-btn', align: 'center', sortable: false },

                ],
            }
        },
        created(){

        },
        mounted(){

        },
        methods:{

        },
        computed:{

        }
    }
</script>

<style scoped>

</style>
