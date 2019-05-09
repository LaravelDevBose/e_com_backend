<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Category</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Parent Category:</label>
                            <treeselect v-model="form.parent_id" :options="treeList" :normalizer="normalizer" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" class="form-control" placeholder="Category Name " required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category Banner:</label>
                            <v-uploader  :preview="true"></v-uploader>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div class="content-group-lg">
                            <div class="checkbox checkbox-switchery">
                                <label>
                                    <input type="checkbox" class="switchery-primary" checked="checked">
                                    Publish
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="text-right form-group">
                            <button type="submit" class="btn btn-primary">Save Category <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Category List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Banner Image</th>
                        <th>Category Name</th>
                        <th>2nd Parent</th>
                        <th>1rd Parent</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="categories" v-for="(category , index) in categories" :key="category.id">
                        <td>{{ index }}</td>
                        <td>
                            <img :src="category.image_path" :alt="category.label" class="img-xs img-preview img-responsive">
                        </td>
                        <td>
                            <span class="text text-bold"> {{ category.name }}</span>
                        </td>
                        <td>
                            <span class="text text-center" v-if="category.parent !== null">{{ category.parent.name }}</span>
                        </td>
                        <td>
                            <span class="text text-center" v-if="category.parent !== null && category.parent.parent !== null">{{ category.parent.parent.name }}</span>

                        </td>
                        <td>
                            <span class="badge badge-success" v-if="category.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td>
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#"><i class="icon-trash"></i></a></li>
                                <li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    // import the component
    import Treeselect from '@riophae/vue-treeselect';
    import PNotify from '../includes/PNotify';
    // import the styles
    import '@riophae/vue-treeselect/dist/vue-treeselect.css';

    import {mapGetters, mapActions} from 'vuex'
    export default {
        name: "Category",
        components:{ Treeselect, PNotify},
        data(){
            return{
                form:{
                    parent_id:null,
                    category_name:null,
                },
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                }
            }
        },
        created(){
            this.allCategory();
            this.getTreeListCategories();
        },
        methods:{
          ...mapActions([
              'allCategory',
              'getTreeListCategories',
          ])
        },
        computed:{
            ...mapGetters([
                'categories',
                'treeList'
            ])
        }
    }
</script>

<style scoped>

</style>
