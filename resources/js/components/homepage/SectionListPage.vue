<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-indigo">
                <h5 class="panel-title">HomePage Section List</h5>
                <div class="heading-elements">
                    <a href="/admin/homepage/section/create" class="btn btn-success btn-sm btn-inline"><i class="icon-plus-circle2 text-left"></i> Add New section</a>
                </div>

            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <td class="text-center">#</td>
                                        <td style="width: 150px;">Section Banner</td>
                                        <td>Section Title</td>
                                        <td class="text-center">Section Type</td>
                                        <td class="text-center">Section Position</td>
                                        <td class="text-center">Total Product</td>
                                        <td class="text-center">Status</td>
                                        <td class="text-center">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="homepageSections" v-for="(section, index) in homepageSections" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td>
                                            <img  :src="sectionBanner(section)" :alt="section.title" style="width: 100%;">
                                        </td>
                                        <td class="text-left">{{ section.title }}</td>
                                        <td class="text-center">{{ section.type }}</td>
                                        <td class="text-center">{{ section.position }}</td>
                                        <td class="text-center">{{ section.total_product }}</td>
                                        <td class="text-center">
                                            <span v-if="section.status === 1" class="badge badge-success">Active</span>
                                            <span v-else class="badge badge-warning">Inactive</span>
                                        </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="#" class="text text-primary-700" @click.prevent="goToShowPage(section.id)"><i class="icon-eye"></i></a></li>
                                                <li><a href="#" class="text text-info" @click.prevent="goToEditPage(section.id)"><i class="icon-pencil7"></i></a></li>
                                                <li><a href="#" class="text text-teal-700" @click.prevent="goToProductManagePage(section.id)"><i class="icon-cog2"></i></a></li>
                                                <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(section.id)"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "SectionListPage",
        data(){
            return{
                image_path:'',
            }
        },
        mounted() {
            this.getSectionList();
        },
        methods:{
            ...mapActions([
                'getSectionList'
            ]),
            goToShowPage(Id){
                location.href = `${Id}/`;
            },
            goToEditPage(Id){
                alert('Not Done Yet');
                return false;
                location.href = `${Id}/edit`;
            },
            goToProductManagePage(Id){
                location.href = `${Id}/manage/products`;
            },
            showDeletePopUp(Id){
                alert('Not Done Yet');
                return false;
            },
            sectionBanner(section){
                if(section.hasOwnProperty('banner')){
                    this.image_path = section.banner.image_path;
                }else {
                    this.image_path = BASE_URL+'/assets/images/placeholder.jpg';
                }


                if(this.image_path === '' || this.image_path === false){
                    this.image_path = BASE_URL+'/assets/images/placeholder.jpg';
                }
                return this.image_path;
            }

        },
        computed:{
            ...mapGetters([
                'homepageSections'
            ])
        },
    }
</script>

<style scoped>

</style>
