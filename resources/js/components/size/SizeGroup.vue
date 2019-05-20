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
                <form action="" @submit.prevent="sizeGroupStore">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Categories:</label>
                                <treeselect v-model="form.categoryIDs" :multiple="true" :options="treeList" :normalizer="normalizer" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Size Group Name:</label>
                                <input type="text" v-model="form.size_group_title" class="form-control" placeholder="Size Group Name" required>
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
                                <button type="submit" class="btn btn-primary">Save Size Group <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
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
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="padding:5px;">Group Name</th>
                        <th>Category Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="sizeGroups" v-for="(sizeGroup , index) in sizeGroups" :key="sizeGroup.id">
                        <td>{{ index }}</td>

                        <td>
                            <span class="text text-bold"> {{ sizeGroup.name }}</span>
                        </td>
                        <td>
                            <span class="badge badge-info" v-for="SG_cat in sizeGroup.categories">{{ SG_cat.category.name }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="sizeGroup.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeSizeGroup(sizeGroup.id)"><i class="icon-trash"></i></a></li>
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
                },
                btnDisabled:false,
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                },
            }
        },
        created() {
            this.allTreeListCategories();
            this.getAllSizeGroups();

        },
        methods:{
            ...mapActions([
                'getAllSizeGroups',
                'storeSizeGroup',
                'deleteSizeGroup',
                'allTreeListCategories',
            ]),
            sizeGroupStore(){
                //#TODO form validation
                this.storeSizeGroup(this.form)
                    .then(response=>{
                        if(response.status === "status"){
                            alert(response.message);
                            this.formReset();
                        }else{
                            alert(response.message);
                        }
                    })
                    .catch(error=>{
                        alert(error.message);
                    })
            },
            formReset(){
                this.form.size_group_title = '';
                this.form.categoryIDs = [];
                this.form.size_group_status = 0;
            },
            removeSizeGroup(groupId){
                if(confirm('Are You Sure..?')){
                    this.deleteSizeGroup(groupId)
                        .then(response=>{
                            if(response.status === "success"){
                                alert(response.message);
                            }else{
                                alert(response.message);
                            }
                        })
                        .catch(error=>{
                            alert(error.message);
                        })
                }
            }
        },
        computed:{
            ...mapGetters([
                'treeList',
                'sizeGroups'
            ]),
        },
        watch:{
            form:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            }
        }
    }
</script>

<style scoped>

</style>
