<template>
    <div class="content">
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Slider List</h5>
                <div class="heading-elements">
                    <a href="/admin/cms/pages/create" type="button" class="btn bg-success btn-sm" > <i class="icon-plus-circle2 position-left"></i> Add Pages</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="padding:5px;">Page Title</th>
                        <th>Menu Title</th>
                        <th>Show In</th>
                        <th>Position</th>
                        <th>Page Category</th>
                        <th>Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="pagesList" v-for="(page , index) in pagesList" :key="page.id">
                        <td>{{ index }}</td>
                        <td>
                            <span class="text text-bold"> {{ page.title }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ page.menuTitle }}</span>
                        </td>
                        <td>
                            <span class="text text-bold">{{ page.showIn }}</span>
                        </td>
                        <td>
                            <span class="text text-bold">{{ page.position }}</span>
                        </td>
                        <td>
                            <span class="text text-bold label bg-info" v-if="page.category ===1">Terms & Conditions</span>
                            <span class="text text-bold label bg-primary" v-if="page.category ===2">Privacy & Policy</span>
                            <span class="text text-bold label bg-teal" v-if="page.category ===3">Customer Service</span>
                        </td>
                        <td style="padding:5px; width:200px;">
                            <img v-if="page.attachment" :src="page.attachment.image_path" :alt="page.title" class="img-preview img-responsive" style="width:200px; height:100px;" >
                        </td>

                        <td class="text text-center">
                            <span class="badge badge-success" v-if="page.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-info-600"><a href="#" @click.prevent="showGeneralPage(page.id)"><i class="icon-eye"></i></a></li>
                                <li class="text-primary-600"><a href="#" @click.prevent="editGeneralPage(page.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#"  @click.prevent="pageDelete(page.id)"><i class="icon-trash"></i></a></li>
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
        name: "GeneralPagesList",
        data(){
            return{

            }
        },
        created(){
            this.getGeneralPagesList();
        },
        methods:{
            ...mapActions([
                'getGeneralPagesList',
                'deleteGeneralPage',
            ]),
            pageDelete(pageId){
                let con= confirm('Are You Sure..?');

                if(con){
                    this.deleteGeneralPage(pageId)
                        .then(response=>{
                            if(response.code == 200){
                                Notify.success(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        });
                    return true;
                }else{
                    return false;
                }
            },
            showGeneralPage(pageId){
                window.location = '/admin/cms/pages/'+pageId;
            },
            editGeneralPage(pageId){
                window.location = '/admin/cms/pages/'+pageId+'/edit';
            }
        },
        computed:{
            ...mapGetters([
                'pagesList',
            ]),
        }
    }
</script>

<style scoped>

</style>
