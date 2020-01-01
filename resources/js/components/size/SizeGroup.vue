<template>
    <div class="content">
        <div class="panel panel-info" v-if="!is_edit">
            <div class="panel-heading">
                <h5 class="panel-title">Product Size Group</h5>
                <!--<div class="heading-elements">
                    <button type="button" class="btn bg-orange-800 btn-sm" @click="bulkSizeGroupModel">Bulk Size Group <i class="icon-play3 position-right"></i></button>
                    <button type="button" class="btn bg-orange-800 btn-sm" @click="bulkSizeModel">Bulk Size <i class="icon-play3 position-right"></i></button>
                </div>-->
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="sizeGroupStore" >
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
                        <div class="col-md-12" >
                            <div style="margin-bottom:1rem;">
                                <label style="margin-left:.5rem">Size Name:</label>
                                <span class="btn btn-sm btn-success " @click="addSizeField"> <i class="icon-plus-circle2"></i></span>
                                <span class="btn btn-sm btn-danger " @click="removeSizeField"> <i class="icon-minus-circle2"></i></span>
                            </div>

                            <div class="row">
                                <div class="col-md-2" v-for="inputLng in sizeInput" :key="inputLng" :id="'size-'+inputLng">
                                    <div class="form-group">
                                        <input type="text" v-model="form.sizeNames[inputLng]" class="form-control" placeholder="Size Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-7">
                            <div class="form-group">
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success" v-if="form.size_group_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="paypal_payment" v-model="form.size_group_status" :checked="form.size_group_status">
                                    <span class="checkmark"></span>
                                </label>
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

        <div class="panel" v-if="is_edit">
            <div class="panel-heading bg-teal">
                <h5 class="panel-title">Edit Product Size Group</h5>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="sizeGroupUpdate" >
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
                        <div class="col-md-12" >
                            <div style="margin-bottom:1rem;">
                                <label style="margin-left:.5rem">Size Name:</label>
                                <span class="btn btn-sm btn-success " @click="addSizeField"> <i class="icon-plus-circle2"></i></span>
                                <span class="btn btn-sm btn-danger " @click="removeSizeField"> <i class="icon-minus-circle2"></i></span>
                            </div>

                            <div class="row">
                                <div class="col-md-2" v-for="inputLng in sizeInput" :key="inputLng" :id="'size-'+inputLng">
                                    <div class="form-group">
                                        <input type="text" v-model="form.sizeNames[inputLng]" class="form-control" placeholder="Size Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-7">
                            <div class="form-group">
                                <label class="checkbox-style" for="edit_status">
                                    <span class="text-bold text-success" v-if="form.size_group_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="edit_status" v-model="form.size_group_status" :checked="form.size_group_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-right form-group">
                                <button type="submit" class="btn btn-primary">Update Size Group <i class="icon-arrow-right14 position-right"></i></button>
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
                        <th>Size Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="sizeGroups.lenght !== 0" v-for="(sizeGroup , index) in sizeGroups" :key="sizeGroup.id">
                        <td>{{ index }}</td>

                        <td>
                            <span class="text text-bold"> {{ sizeGroup.name }}</span>
                        </td>
                        <td>
                            <span class="label label-info"  v-for="(SG_cat, index) in sizeGroup.categories" :key="index">{{ SG_cat.category.name }}</span>
                        </td>
                        <td>
                            <span class="label bg-teal"  v-for="size in sizeGroup.sizes" :key="size.id">{{ size.size_name }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="label label-success" v-if="sizeGroup.status === 1">Active</span>
                            <span class="label label-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#" @click="editSizeGroup(sizeGroup.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeSizeGroup(sizeGroup.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <import-data :example_image="format_image" :upload_url="action_url" :example_file="format_file" ></import-data>
        <!-- /basic table -->
    </div>
</template>

<script>
    import Treeselect from '@riophae/vue-treeselect';

    import {mapGetters, mapActions} from 'vuex';
    import ImportData from "../helper/ImportData";
    import CreateSizeGroup from "./CreateSizeGroup";

    export default {
        name: "Size",
        components:{CreateSizeGroup, Treeselect, 'import-data':ImportData},
        data(){
            return{
                form:{
                    group_id:'',
                    size_group_title:'',
                    categoryIDs:[],
                    size_group_status:0,
                    sizeNames:[],
                },
                btnDisabled:false,
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                },
                sizeInput:1,
                sizeRemove:false,
                format_image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
                action_url:'',
                format_file:'',
                is_edit:false,
            }
        },
        created() {
            this.allTreeListCategories();
            this.getAllSizeInfo();
            this.form.sizeNames.splice(0, 1);
        },
        methods:{
            ...mapActions([
                'getAllSizeInfo',
                'storeProductSize',
                'deleteProductSize',
                'allTreeListCategories',
                'updateProductSize',
            ]),
            addSizeField(){

                this.sizeInput++;
                if(this.sizeInput === 1){
                    this.sizeRemove = false;
                }else{
                    this.sizeRemove = true;
                }

            },
            removeSizeField(){

                this.form.sizeNames.splice(this.sizeInput, 1);
                if(this.sizeInput === 1){
                    return;
                }else{
                    if(this.sizeInput === 1){
                        this.sizeRemove = false;
                    }else{
                        this.sizeRemove = true;
                        this.sizeInput--;
                    }
                    return ;
                }

            },
            sizeGroupStore(){
                this.btnDisabled=  true;
                this.storeProductSize(this.form)
                    .then(response=>{
                        if(response.status === "success"){
                            Notify.success(response.message);
                            this.formReset();
                        }else{
                            Notify.error(response.message);
                        }
                    })
                    .catch(error=>{
                        Notify.error(error.message);
                    })
            },
            formReset(){
                this.form.size_group_title = '';
                this.form.categoryIDs.length = 0;
                this.form.sizeNames.length = 0;
                this.form.size_group_status = 0;
                this.sizeInput = 1;
                this.btnDisabled=  false;
            },
            removeSizeGroup(groupId){
                if(confirm('Are You Sure..?')){
                    this.deleteProductSize(groupId)
                        .then(response=>{
                            if(response.code === 200){
                                Notify.success(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                        .catch(error=>{
                            Notify.error(error.message);
                        })
                }
            },
            bulkSizeGroupModel(){
                this.action_url = '/admin/import/size-group';
                this.format_file='http://e_com.pc/excel_demo/size_group.xlsx'
                $('#modal_import_file').modal('show');
            },
            bulkSizeModel(){
                this.action_url = '/admin/import/size';
                this.format_file='http://e_com.pc/excel_demo/size.xlsx'
                $('#modal_import_file').modal('show');
            },

            editSizeGroup(ID){
                this.sizeGroups.filter(sizeGroup=>{
                    if(sizeGroup.id === ID){
                        this.is_edit = true;
                        this.form.group_id = sizeGroup.id;
                        this.form.size_group_title = sizeGroup.name;
                        this.form.size_group_status = sizeGroup.status;
                        this.form.categoryIDs.length = 0;
                        sizeGroup.categories.forEach(cat=>{
                            this.form.categoryIDs.push(cat.category.id);
                        });
                        this.sizeInput=0;
                        this.form.sizeNames.length = 0;
                        sizeGroup.sizes.forEach(size=>{
                            this.sizeInput++;
                            this.form.sizeNames.push(size.size_name);
                        });
                        /*this.sizeInput = this.form.sizeNames.length;*/
                    }
                })
            },
            sizeGroupUpdate(){
                this.btnDisabled=  true;
                this.updateProductSize(this.form)
                    .then(response=>{
                        if(response.code === 200){
                            Notify.success(response.message);
                            this.formReset();
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message)
                        }else{
                            Notify.error(response.message);
                        }
                    })
                    .catch(error=>{
                        Notify.error(error.message);
                    })
            },
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
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            }
        }
    }
</script>

<style scoped>
    .label{
        margin: 2px;
    }
</style>
