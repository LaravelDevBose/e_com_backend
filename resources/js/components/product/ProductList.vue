<template>
    <vue-data-table></vue-data-table>
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
                {width: '33%', label: 'Deadline', name: 'deadline' },
                {width: '33%', label: 'Budget', name: 'budget'},
                {width: '33%', label: 'Status', name: 'status'}
            ];
            columns.forEach((column) => {
                sortOrders[column.name] = -1;
            });
            return {
                columns: columns,
                sortKey: 'deadline',
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
            }
        },
        created(){
            this.getProducts();
        },
        method:{
            ...mapActions([

            ]),

            getProducts() {
                this.tableData.draw++;
                axios.get(url, {params: this.tableData})
                    .then(response => {
                        let data = response.data;
                        if (this.tableData.draw == data.draw) {
                            this.products = data.data.data;
                            this.configPagination(data.data);
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
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
                'products'
            ])
        }

    }
</script>

<style scoped>

</style>