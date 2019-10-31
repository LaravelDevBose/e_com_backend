<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Product Tag/Keywords</h5>
                <div class="heading-elements">
                    <button type="button" class="btn bg-orange-800 btn-sm" data-toggle="modal" data-target="#modal_import_file">Bulk Import <i class="icon-play3 position-right"></i></button>
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="tagManipulate">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-lg-1 control-label">Tag Title:</label>
                            <div class="col-lg-5">
                                <input type="text" v-model="form.tag_title" class="form-control" placeholder="Tag Title" required />
                            </div>
                            <div class="col-md-2 ">
                                <div class="content-group-lg">
                                    <div class="checkbox checkbox-switchery">
                                        <label>
                                            <input type="checkbox" v-model="form.tag_status" class="switchery-primary" checked="checked">
                                            Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="text-right form-group">
                                    <button type="submit" :disabled="btnDisabled" class="btn btn-primary">Save Tag <i class="icon-arrow-right14 position-right"></i></button>
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
                <h5 class="panel-title">Tag List</h5>
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
                        <th>Tag Title</th>
                        <th class="text text-center" style="width: 120px;">Tag Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="tags" v-for="(tag,index) in tags" :key="tag.id">
                        <td>{{ index }}</td>
                        <td>{{ tag.title }}</td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="tag.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#" @click.prevent="editTag(tag.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeTag(tag.id)"><i class="icon-trash"></i></a></li>
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
        name: "Tag",
        components:{'import-data':ImportData},
        data(){
            return {
                form:{
                    tag_id:'',
                    tag_name:'',
                    tag_status:false,
                },
                btnDisabled:false,
                format_image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
                action_url:'/admin/import/tags',
                format_file:'http://e_com.pc/excel_demo/tags.xlsx',
                is_edit:0,
            }
        },
        created() {
            this.getTags();
        },
        methods:{
            ...mapActions([
                'getTags',
                'storeTag',
                'deleteTag',
                'updateTag'
            ]),

            tagManipulate(){
                this.btnDisabled = true;
                if(this.is_edit ===1 || this.is_edit === true){
                    this.updateTag(this.form).then(response=>{
                        if(response.status === 'success' && response.code === 200){
                            Notify.success(response.message);
                            this.resetForm();
                            this.btnDisabled = false;
                            this.is_edit = 0;
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
                }else{
                    this.storeTag(this.form).then(response=>{
                        if(response.status === 'success' && response.code === 201){
                            Notify.success(response.message);
                            this.resetForm();
                            this.btnDisabled = false;
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
                }
            },
            resetForm(){
                this.form.tag_id = '';
                this.form.tag_title = '';
                this.form.tag_status = false;
            },
            removeTag(tagID){
                if(confirm('Are You Sure..?')){
                    this.deleteTag(tagID).then(response=>{
                        if(response.status === 'success' && response.code === 200){
                            Notify.success(response.message);
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    });
                }
            },
            editTag(tagId){
                this.tags.filter(tag=>{
                    if(tag.id === tagId){
                        this.form.tag_id= tag.id;
                        this.form.tag_title= tag.title;
                        this.form.tag_status = tag.status;
                        this.is_edit = 1;
                    }
                });
            }
        },
        computed:{
            ...mapGetters([
                'tags'
            ])
        },
        watch:{
            form:{
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
