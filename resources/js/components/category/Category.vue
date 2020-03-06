<template>
    <div class="content">
        <!-- Basic table -->
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">Category List</h5>
                <div class="heading-elements">
                    <div class="heading-elements">
                        <a href="/admin/category/create" class="btn btn-success btn-sm btn-inline"><i class="icon-plus-circle2 text-left"></i> Add New Category</a>
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
                            <datatable class="table-bordered table-striped" :columns="columns" :data="categories" :filter-by="filter"></datatable>
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
    Vue.component('category-banner', {
        template: `<img v-if="row.attachment" :src="row.attachment.image_path" :alt="row.label" class="img-preview img-responsive" style="width:100px; height:35px;" >`,
        props: ['row']
    });
    Vue.component('second-parent', {
        template: `<span class="text text-center" v-if="row.parent !== null">{{ row.parent.name }}</span>`,
        props: ['row']
    });
    Vue.component('first-parent', {
        template: `<span class="text text-center" v-if="row.parent !== null && row.parent.parent !== null">{{ row.parent.parent.name }}</span>`,
        props: ['row']
    });
    Vue.component('is-show', {
        template: `<span class="badge badge-success" v-if="row.is_show === 1">Show</span>
                    <span class="badge badge-warning" v-else>Now Show</span>`,
        props: ['row']
    });
    Vue.component('category-status', {
        template: `
            <span class="badge badge-success" v-if="row.status === 1">Active</span>
            <span class="badge badge-warning" v-else>De-active</span>
        `,
        props: ['row']
    });
    Vue.component('category-action', {
        template: `<ul class="icons-list">
                        <li class="text-primary-600"><a href="#" @click.prevent="goToEditPage(row.id)"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a href="#" @click.prevent="deleteCategory(row.id)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods:{
            ...mapActions([
                'categoryDelete',
            ]),
            deleteCategory(cat_id){
                if(confirm('Are Your Sure..?'+cat_id)){
                    this.categoryDelete(cat_id).then(response=>{
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
                location.href = `/admin/category/${Id}/edit`
            }
        }
    });

    export default {
        name: "Category",
        data(){
            return{
                laravelData:{},
                page: 1,
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: 'Image', component: 'category-banner', align: 'center', sortable: false },
                    { label: 'Category Name', field: 'name',  },
                    // { label: 'Trans. Category Name', field: 'trans_name' , },
                    { label: '2nd Parent', component:'second-parent' },
                    { label: '1st Parent', component:'first-parent' },
                    // { label: 'Show in Header', component: 'is-show', align: 'center', sortable: true },
                    { label: 'Status', component: 'category-status', align: 'center', sortable: false },
                    { label: 'Action', component: 'category-action', align: 'center', sortable: false },

                ],
            }
        },
        created(){
            this.allCategory();
        },
        methods:{
            ...mapActions([
                'allCategory',
                'categoryDelete',
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
                'categories',

            ]),
        }
    }
</script>

<style scoped>

</style>
