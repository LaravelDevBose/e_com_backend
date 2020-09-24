<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal">
                <h5 class="panel-title" v-if="is_edit===0">Create Color</h5>
                <h5 class="panel-title" v-else>Update Color</h5>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="colorManipulate">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Color Name:</label>
                                <input type="text" v-model="form.color_name" class="form-control" placeholder="Color Name " required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Color Code:</label>
                                <input type="color" v-model="form.color_code" class="form-control colorpicker-palette" value="#27ADCA">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Color Status:</label>
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success" v-if="form.color_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="paypal_payment" v-model="form.color_status"  :checked="form.color_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">Save Color <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Color List</h5>
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
                                <li class="text-primary-600"><a href="#" @click.prevent="editColor(color.id)"><i class="icon-pencil7"></i></a></li>
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
                    color_id:'',
                    color_name:'',
                    color_code:'#ffffff',
                    color_status:false,
                },
                btnDisabled:false,
                format_image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
                action_url:'/admin/import/color',
                format_file:'http://e_com.pc/excel_demo/color.xlsx',
                is_edit:0,
            }
        },
        created() {
            this.getColors();
        },
        methods:{
            ...mapActions([
                'getColors',
                'storeColor',
                'deleteColor',
                'updateColor'
            ]),
            colorManipulate(){
                this.btnDisabled = true;
                if(this.is_edit){
                    this.updateColor(this.form).then(response=>{
                        if(response.code === 200){
                            Notify.success(response.message);
                            this.clearFormData();
                            this.btnDisabled = false;
                            this.is_edit=false;
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
                }else{
                    this.storeColor(this.form).then(response=>{
                        if(response.code === 201){
                            Notify.success(response.message);
                            this.clearFormData();
                            this.btnDisabled = false;
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })

                }
            },
            clearFormData(){
                this.form.color_id ='';
                this.form.color_code = '#ffffff';
                this.form.color_name = '';
                this.form.color_status = false;

            },
            removeColor(colorId){
                if(confirm('Are You Sure..?')){
                    this.deleteColor(colorId)
                        .then(response=>{
                            if(response.code === 200){
                                Notify.success(response.message);
                            }else {
                                Notify.error(response.message);
                            }
                        });
                }else{
                    return false;
                }
            },
            editColor(colorId){
                this.colors.filter(color=>{
                    if(color.id === colorId){
                        this.form.color_id= color.id;
                        this.form.color_name= color.name;
                        this.form.color_code= color.code;
                        this.form.color_status = color.status;
                        this.is_edit = 1;
                    }
                });
            }
        },
        computed:{
            ...mapGetters([
                'colors',
                'import_status'
            ])
        },
        watch:{
            form:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            'this.import_status':{
                handler(newValue, oldValue){
                    alert('yyyy');
                    if(newValue === 1){
                        this.getColors();
                    }
                },
                deep:true,
            }
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
