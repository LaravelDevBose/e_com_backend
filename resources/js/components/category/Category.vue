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

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="padding:5px;">Banner Image</th>
                        <th>Category Name</th>
                        <th>Trans. Category Name</th>
                        <th>2nd Parent</th>
                        <th>1rd Parent</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Show in Header</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="categories" v-for="(category , index) in categories" :key="category.id">
                        <td>{{ index }}</td>
                        <td style="padding:5px; width:120px;">
                            <img v-if="category.attachment" :src="category.attachment.image_path" :alt="category.label" class="img-preview img-responsive" style="width:100px; height:35px;" >
                        </td>
                        <td>
                            <span class="text text-bold"> {{ category.name }}</span>
                        </td>
                        <td>
                            <span class="text text-bold" v-if="category.trans_name"> {{ category.trans_name }}</span>
                        </td>
                        <td>
                            <span class="text text-center" v-if="category.parent !== null">{{ category.parent.name }}</span>
                        </td>
                        <td>
                            <span class="text text-center" v-if="category.parent !== null && category.parent.parent !== null">{{ category.parent.parent.name }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="category.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="category.is_show === 1">Show</span>
                            <span class="badge badge-warning" v-else>Now Show</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a :href="`/admin/category/${category.id}/edit`"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="deleteCategory(category.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    import { mapGetters, mapActions} from 'vuex';
    export default {
        name: "Category",
        data(){
            return{
                laravelData:{},
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
