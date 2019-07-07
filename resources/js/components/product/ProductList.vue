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
                <vue-data-table :columns="columns" :sort-key="sortKey" :sort-orders="sortOrders"></vue-data-table>
            </div>
        </div>
    </div>
</template>

<script>
    import VueDataTable from '../helper/table/VueDataTable'
    import Pagination from '../helper/table/Pagination'
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "ProductList",
        components:{
            'vue-data-table':VueDataTable,
            'vue-pagination':Pagination,
        },
        data(){
            let sortOrders = {};
            let columns = [
                {label: 'Product Name', name: 'product_title' },
                {label: 'Product SKU', name: 'sku'},
                {label: 'Category', name: 'category'},
                {label: 'Brand', name: 'brand'},
                {label: 'Quantity', name: 'total_qty'},
                {label: 'Status', name: 'status_label'},
            ];
            columns.forEach((column) => {
                sortOrders[column.name] = -1;
            });
            return {
                columns: columns,
                sortKey: 'product_title',
                sortOrders: sortOrders,
                perPage: ['10', '20', '30'],
                tableData: {
                    draw: 0,
                    length: 10,
                    search: '',
                    column: 0,
                    dir: 'desc',
                },
                pagination: {
                    lastPage: '',
                    currentPage: '',
                    total: '',
                    lastPageUrl: '',
                    nextPageUrl: '',
                    prevPageUrl: '',
                    from: '',
                    to: ''
                },
                products:'',
            }
        },
        created() {
            this.getProductsData();
        },
        methods:{
            ...mapActions([
                'getProducts'
            ]),

            getProductsData(){
                let vm = this;
                vm.tableData.draw++;
                vm.getProducts(vm.tableData).then(response=>{
                    let data = response.data;
                    if (vm.tableData.draw === data.draw) {

                        vm.products = data.data;
                        vm.configPagination(data.data);
                    }
                })
            },
            configPagination(data) {
                this.pagination.lastPage = data.last_page;
                this.pagination.currentPage = data.current_page;
                this.pagination.total = data.total;
                this.pagination.lastPageUrl = data.last_page_url;
                this.pagination.nextPageUrl = data.next_page_url;
                this.pagination.prevPageUrl = data.prev_page_url;
                this.pagination.from = data.from;
                this.pagination.to = data.to;
            },
            sortBy(key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
                this.tableData.column = this.getIndex(this.columns, 'name', key);
                this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
                this.getProjects();
            },
            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value)
            },
        },
        computed:{
            ...mapGetters([

            ])
        }

    }
</script>

<style scoped>

</style>