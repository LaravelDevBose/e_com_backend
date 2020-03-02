<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Product Skin Type</h5>
                <!--<div class="heading-elements">
                    <button type="button" class="btn bg-orange-800 btn-sm" data-toggle="modal" data-target="#modal_import_file">Bulk Import <i class="icon-play3 position-right"></i></button>
                </div>-->
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="skinTypeStoreUpdate">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-lg-1 control-label">Skin Type:</label>
                            <div class="col-lg-5">
                                <input type="text" v-model="form.skin_type" class="form-control" placeholder="Skin Type Name" required />
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox-style" for="status">
                                        <span class="text-bold text-success" v-if="form.skin_type_status">Active</span>
                                        <span class="text-bold text-warning" v-else>Inactive</span>
                                        <input type="checkbox" id="status" v-model="form.skin_type_status" :checked="form.skin_type_status">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="text-right form-group">
                                    <button type="submit" :disabled="btnDisabled" class="btn btn-primary">
                                        <span v-if="is_edit">Update Skin Type</span>
                                        <span v-else>Save Skin Type</span>
                                        <i class="icon-arrow-right14 position-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Skin Type List</h5>
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
                        <th>Skin Type</th>
                        <th class="text text-center" style="width: 120px;">Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="skin_types" v-for="(skin_type,index) in skin_types" :key="skin_type.id">
                        <td>{{ index }}</td>
                        <td>{{ skin_type.skinType_title }}</td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="skin_type.skinType_status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#" @click.prevent="editSkinType(skin_type.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeSkinType(skin_type.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
        <import-data :example_image="format_image" :upload_url="action_url" :example_file="format_file" ></import-data>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ImportData from "../helper/ImportData";

    export default {
        name: "SkinType",
        components:{'import-data':ImportData},
        data(){
            return {
                form:{
                    id:'',
                    skin_type:'',
                    skin_type_status:false,
                },
                btnDisabled:false,
                format_image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
                action_url:'/admin/import/skinType',
                format_file:'http://e_com.pc/excel_demo/skin_types.xlsx',
                is_edit:false,
            }
        },
        created() {
            this.getSkinTypes();
        },
        methods:{
            ...mapActions([
                'getSkinTypes',
                'storeSkinType',
                'deleteSkinType',
                'updateSkinType'
            ]),
            skinTypeStoreUpdate(){
                this.btnDisabled = true;
                if(this.is_edit === true){
                    this.updateSkinType(this.form).then(response=>{
                        if(response.status === 'success'){
                            Notify.success(response.message);
                            this.resetForm();
                            this.btnDisabled = false;
                            this.is_edit = false;
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message)
                        }
                    })
                }else{
                    this.storeSkinType(this.form).then(response=>{
                        if(response.status === 'success'){
                            Notify.success(response.message);
                            this.resetForm();
                            this.btnDisabled = false;
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message)
                        }
                    })
                }
            },
            resetForm(){
                this.form.skin_type = '';
                this.form.skin_type_status = 0;
            },
            removeSkinType(ID){

                if(confirm('Are You Sure..?')){
                    this.deleteSkinType(ID).then(response=>{
                        if(response.status === 'success'){
                            Notify.success(response.message);
                        }
                    });
                }
            },
            editSkinType(ID){
                this.skin_types.filter(skin=>{
                    if (skin.id === ID){
                        this.form.id = skin.id;
                        this.form.skin_type = skin.skinType_title;
                        this.form.skin_type_status = skin.skinType_status;
                        this.is_edit = true;
                    }
                });
            }
        },
        computed:{
            ...mapGetters([
                'skin_types'
            ]),
            formData(){
                return JSON.parse(JSON.stringify(this.form));
            }
        },
        watch:{
            formData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
