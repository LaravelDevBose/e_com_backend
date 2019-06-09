<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Brand</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="brandStore">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand Name:</label>
                                <input type="text" v-model="from.brand_name" class="form-control" placeholder="Brand Name " required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand Banner:</label>
                                <attachment :multi_file="multi_file" :folder="folder"></attachment>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-6">
                            <div class="content-group-lg">
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" v-model="from.brand_status" class="switchery-primary" :checked="from.brand_status">
                                        <span class="text-success" v-if="from.brand_status"> Publish</span>
                                        <span class="text-danger" v-else> UnPublish</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-right form-group">
                                <button type="submit" class="btn btn-primary">Save Brand <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Brand List</h5>
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
                        <th>Brand Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="brands" v-for="(brand , index) in brands" :key="brand.id">
                        <td>{{ index }}</td>
                        <td style="padding:5px; width:120px;">
                            <img v-if="brand.attachment" :src="brand.attachment.image_path" :alt="brand.name" class="img-preview img-responsive" style="width:100px; height:35px;" >
                        </td>
                        <td>
                            <span class="text text-bold"> {{ brand.name }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="brand.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="brandDelete(brand.id)"><i class="icon-trash"></i></a></li>
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
    import Attachment from "../attachment/Attachment";
    import {mapGetters, mapActions} from  'vuex';

    export default {
        name: "Brand",
        components: {Attachment},
        data(){
            return{
                from:{
                    brand_name:'',
                    brand_status:'',
                    attachment_id:'',
                },
                folder:'brand',
                multi_file:false,
                btnDisabled:false,

            }
        },
        created() {
            this.getBrands();
        },
        methods:{
            ...mapActions([
                'getBrands',
                'storeBrand',
                'deleteBrand',
            ]),
            brandStore(){
                //TODO from Validation

                this.from.attachment_id = this.attachment_ids;
                this.storeBrand(this.from)
                    .then(response=>{
                        console.log(response);
                        if(response.status === "success"){
                            Notify.success(response.message);
                            this.formReset();
                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
                    .catch(error=>{
                        Notify.info(error.message);
                    })
            },
            formReset(){
                this.from.brand_name='';
                this.from.brand_status = false;
                this.from.attachment_id = '';
                this.$store.commit('emptyAttachmentFile');
            },
            brandDelete(brandId){
                if(confirm('Are You Sure..?')){
                    this.deleteBrand(brandId)
                        .then(response=>{
                            if(response.status === "success"){
                                Notify.success(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                }else{
                    return false;
                }
            }

        },
        computed:{
            ...mapGetters([
                'brands',
                'attachment_ids',
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
            },
        }
    }
</script>

<style scoped>

</style>
