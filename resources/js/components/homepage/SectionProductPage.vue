<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal">
                <h5 class="panel-title">HomePage Section Details</h5>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <h6 class="text text-semibold"> Title: <span class="text-bold"> {{ sectionData.section_title }}</span> </h6>
                        <h6 class="text text-semibold"> Type: <span class="text-bold">{{ sectionData.type_label }}</span> </h6>
                        <h6 class="text text-semibold"> Position: <span class="text-bold"> {{ sectionData.section_position }}</span> </h6>

                        <h6 class="text text-semibold"> Selected Category:</h6>
                        <ul v-if="sectionData.section_categories">
                            <li v-for="(sectCat,index) in sectionData.section_categories" :key="index">{{ sectCat.category.category_name }} </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img v-if="sectionData.attachment" :src="sectionData.attachment.image_path" :alt="sectionData.section_title">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading bg-info">
                <h5 class="panel-title">Add Section Products</h5>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="storeSectionProducts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="form-inline" style="margin:1em;">
                                    <div class="form-group">
                                        <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                                    </div>
                                </div>

                                <div id="table">
                                    <datatable class="table-bordered table-striped" :columns="columns" :data="catProducts" :filter-by="filter"></datatable>
                                </div>
                                <div class="form-inline">
                                    <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-6">
                            <div class="content-group-lg"  style="margin-bottom:0!important;">
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox"  class="switchery-primary" :checked="formData.section_status">
                                        <span class="text-success text-bold" v-if="formData.section_status" >Active</span>
                                        <span class="text-danger text-bold" v-else>Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-right form-group" style="margin-bottom:0px;">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block">Save Section Product <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ProductThumbImg from "../helper/table/ProductThumbImg";
    import ProductCheckbox from "../helper/table/ProductCheckbox";

    export default {
        name: "SectionProductPage",
        props:{
            sectionid:[Number]
        },
        components:{
            'product-thumb-img':ProductThumbImg,
            'product-checkbox':ProductCheckbox,
        },
        data(){
            return{
                formData:{
                    productIds:[],
                    section_id:'',
                    section_status:true,
                },
                page: 1,
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: '#', align: 'center', component: 'product-checkbox', headerClass:'table-checkbox', filterable: false, sortable:false },
                    { label: 'Image', component: 'product-thumb-img', align: 'left', headerClass:'pro-img', sortable: false },
                    { label: 'Product Name', field: 'product_title',  },
                    { label: 'Product SKU', field: 'sku' , },
                    { label: 'Category', field: 'category.name' },
                    { label: 'Brand', field: 'brand.name', sortable: true },
                    { label: 'Quantity', field: 'total_qty', align: 'center', sortable: true }
                ],
                btnDisabled:false,
            }
        },
        created(){
            this.formData.section_id = this.sectionid;
            this.getSectionData(this.sectionid);
        },
        mounted(){
            this.getSectionCategoryProducts(this.sectionid);
        },
        methods:{
            ...mapActions([
                'getSectionData',
                'getSectionCategoryProducts',
                'selectedProductStore',
            ]),
            storeSectionProducts(){
                this.btnDisabled = true;
                if(this.selectedProIds.length <= 0){
                    Notify.validation('Section Product Not Selected.')
                }else{
                    this.formData.productIds = this.selectedProIds;
                }

                this.selectedProductStore(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            setTimeout(()=>{
                               location.href = response.url;
                            },700)
                        }else if(response.code === 400 && response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'catProducts',
                'sectionData',
                'selectedProIds',
            ]),
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
        },
        watch:{
            formDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.btnDisabled = false;
                    }

                }
            },
        }
    }
</script>

<style scoped>

</style>
