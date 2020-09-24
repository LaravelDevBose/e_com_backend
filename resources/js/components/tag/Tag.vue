<template>
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Product Tag/Keywords</h5>
                    </div>

                    <div class="panel-body">
                        <form action="" @submit.prevent="tagManipulate">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tag Title:</label>
                                        <input type="text" v-model="form.tag_title" class="form-control" placeholder="Tag Title " required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tag Status:</label>
                                        <label class="checkbox-style" for="paypal_payment">
                                            <span class="text-bold text-success" v-if="form.tag_status">Active</span>
                                            <span class="text-bold text-warning" v-else>Inactive</span>
                                            <input type="checkbox" id="paypal_payment" v-model="form.tag_status"  :checked="form.tag_status">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="text-right form-group">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success">
                                            <span v-if="is_edit">Update Tag</span>
                                            <span v-else>Save Tag</span>
                                            <i class="icon-arrow-right14 position-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Tag List</h5>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tag Title</th>
                                <th class="text-center" >Tag Status</th>
                                <th class="text-center">Action</th>
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
            </div>
        </div>

        <!-- Basic table -->

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
