<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal">
                <h5 class="panel-title">Create Color</h5>
                <div class="heading-elements">
                    <button type="button" class="btn bg-orange-800 btn-sm" data-toggle="modal" data-target="#modal_import_file">Bulk Import <i class="icon-play3 position-right"></i></button>
                </div>

            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="colorStore">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color Name:</label>
                                <input type="text" v-model="form.color_name" class="form-control" placeholder="Color Name " required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color Code:</label>
                                <input type="color" v-model="form.color_code" class="form-control colorpicker-palette" value="#27ADCA">
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-6">
                            <div class="content-group-lg">
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" v-model="form.color_status" class="switchery-primary" checked="checked">
                                        Publish
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-primary">Save Color <i class="icon-arrow-right14 position-right"></i></button>
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
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th class="text-center">Color View</th>
                        <th class="text-center">Color Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="colors" v-for="(color, index) in colors" :key="color.id">
                        <td>{{ index }}</td>
                        <td class="text-bold">{{ color.name }}</td>
                        <td>{{ color.code }}</td>
                        <td>
                            <div class="color-view" :style="{backgroundColor:color.code}"></div>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="color.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeColor(color.id)"><i class="icon-trash"></i></a></li>
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
        name: "Color",
        components: {ImportData},
        data(){
            return{
                form:{
                    color_name:'',
                    color_code:'#ffffff',
                    color_status:false,
                },
                btnDisabled:false,
                format_image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
                action_url:'',
                format_file:''
            }
        },
        created() {
            this.getColors();
        },
        methods:{
            ...mapActions([
                'getColors',
                'storeColor',
                'deleteColor'
            ]),
            colorStore(){
                this.btnDisabled = true;
                this.storeColor(this.form).then(response=>{
                    if(response.status === 'success'){
                        this.clearFormData();
                        this.btnDisabled = false;
                    }
                })
            },
            clearFormData(){
                this.form.color_code = '#ffffff';
                this.form.color_name = '';
                this.form.color_status = false;

            },
            removeColor(colorId){
                if(confirm('Are You Sure..?')){
                    this.deleteColor(colorId);
                }else{
                    return false;
                }
            }
        },
        computed:{
            ...mapGetters([
                'colors'
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
    .color-view{
        width: 50px;
        height: 30px;
        border: 1px solid #ddd;
        border-radius:5px;
    }
</style>
