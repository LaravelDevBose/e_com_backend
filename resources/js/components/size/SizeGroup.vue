<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Product Size Group</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="categoryStore">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Categories:</label>
                                <treeselect v-model="form.categoryIDs" :options="treeList" :normalizer="normalizer" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name:</label>
                                <input type="text" v-model="form.size_group_title" class="form-control" placeholder="Category Name " required>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <div class="content-group-lg">
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" v-model="form.size_group_status" class="switchery-primary" :checked="form.size_group_status">
                                        <span class="text-success text-bold" v-if="form.size_group_status">Enable</span>
                                        <span class="text-danger text-bold" v-else>Disable</span>
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
                </form>
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
                        <th style="padding:5px;">Banner Image</th>
                        <th>Category Name</th>
                        <th>2nd Parent</th>
                        <th>1rd Parent</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
<!--                    <tr v-if="categories" v-for="(category , index) in categories" :key="category.id">-->
<!--                        <td>{{ index }}</td>-->
<!--                        <td style="padding:5px; width:120px;">-->
<!--                            <img v-if="category.attachment" :src="category.attachment.image_path" :alt="category.label" class="img-preview img-responsive" style="width:100px; height:35px;" >-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <span class="text text-bold"> {{ category.name }}</span>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <span class="text text-center" v-if="category.parent !== null">{{ category.parent.name }}</span>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <span class="text text-center" v-if="category.parent !== null && category.parent.parent !== null">{{ category.parent.parent.name }}</span>-->

<!--                        </td>-->
<!--                        <td class="text text-center">-->
<!--                            <span class="badge badge-success" v-if="category.status === 1">Active</span>-->
<!--                            <span class="badge badge-warning" v-else>De-active</span>-->
<!--                        </td>-->
<!--                        <td class="text text-center">-->
<!--                            <ul class="icons-list">-->
<!--                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>-->
<!--                                <li class="text-danger-600"><a href="#" @click.prevent="deleteCategory(category.id)"><i class="icon-trash"></i></a></li>-->
<!--                            </ul>-->
<!--                        </td>-->
<!--                    </tr>-->

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    import Treeselect from '@riophae/vue-treeselect';
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "SizeGroup",
        components:{Treeselect},
        data(){
            return{
                form:{
                    size_group_title:'',
                    categoryIDs:[],
                    size_group_status:0
                }
            }
        },
        created() {

        },
        methods:{
            ...mapActions([
                'getCategoryList',
                'storeSizeGroup',
                'deleteSizeGroup',
            ])
        },
        computed:{
            ...mapGetters([
               'categoryList',
                'sizeGroups'
            ]),
        },
        watch:{

        }
    }
</script>

<style scoped>

</style>