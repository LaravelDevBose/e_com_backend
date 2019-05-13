<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Product Tag/Keywords</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="tagStore">
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
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeTag(tag.id)"><i class="icon-trash"></i></a></li>
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
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "Tag",
        data(){
            return {
                form:{
                    tag_name:'',
                    tag_status:false,
                },
                btnDisabled:false,
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
            ]),
            tagStore(){
                this.btnDisabled = true;
                this.storeTag(this.form).then(response=>{
                    if(response.status === 'success'){
                        this.resetForm();
                        this.btnDisabled = false;
                    }
                })
            },
            resetForm(){
                this.form.tag_title = '';
                this.form.tag_status = 0;
            },
            removeTag(tagID){
                if(confirm('Are You Sure..?')){
                    this.deleteTag(tagID).then(response=>{
                        if(response.status === 'success'){
                            alert(response.message);
                        }
                    });
                }
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
