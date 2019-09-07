<template>
    <div class="content">

        <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">

                <!-- Post -->
                <div class="panel">
                    <div class="panel-heading bg-teal-400" style="line-height: 3.87rem;">
                        <h5 class="panel-title" style="display: inline-block;">{{ pageData.title }} Details </h5>
                        <a href="" class="btn btn-sm btn-warning text-small" style="float:right; margin-top:0px;" @click.prevent="goBack()"> <i class="icon-undo2"></i> Back</a>
                    </div>
                    <div class="panel-body">
                        <div class="content-group-lg row">

                            <div class="content-group text-center">
                                <a href="#" class="display-inline-block">
                                    <img v-if="pageData.attachment" :src="pageData.attachment.image_path" class="img-responsive" alt="">
                                    <img v-else :src="noImage" class="img-responsive" alt="">
                                </a>
                            </div>

                            <h3 class="text-semibold mb-5">
                                <a href="#" class="text-default">{{ pageData.title }}</a>
                            </h3>

                            <ul class="list-inline list-inline-separate text-semibold content-group">
                                <li>By <span class="text-bold text-teal">Admin</span></li>
                                <li>Created: <span class="text-bold text-teal"> {{ pageData.created_at }}</span> </li>
                                <li>Show in: <span class="text-bold text-teal">{{ pageData.showIn }}</span></li>
                                <li>Menu Position: <span class="text-bold text-teal">{{ pageData.position }}</span> </li>
                                <li>Status:
                                    <span v-if="pageData.status == 1" class="text-bold badge badge-success">Active</span>
                                    <span v-else-if="pageData.status == 2" class="text-bold badge badge-danger">Inactive</span>
                                    <span v-else class="text-bold badge badge-info">Undefined</span>
                                </li>
                                <li style="float:right">
                                    <a href="" class="btn btn-sm bg-info-600" @click.prevent="goToEditPage(pageData.id)"><i class="icon-pencil7"></i> Edit</a>
                                </li>
                            </ul>
                            <hr>
                            <label class="text text-bold">Body Content: </label>
                            <br>
                            <div class="content-group" v-html="pageData.content"></div>
                            <div class="content-group" v-html="pageData.extra_content"></div>

                        </div>
                    </div>
                </div>
                <!-- /post -->
            </div>
        </div>
        <!-- /detached content -->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        props:['id'],
        name: "ShowGeneralPages",
        data(){
            return{
                noImage: BASE_URL+'/assets/images/cover.jpg',
            }
        },
        created() {
            let pageId = this.id;
            console.log(pageId);
            this.singleGeneralPageData(pageId);
        },
        methods:{
            ...mapActions([
                'singleGeneralPageData'
            ]),
            goToEditPage(pageId){
                window.location = '/admin/cms/pages/'+pageId+'/edit';
            },
            goBack(){
                window.location = '/admin/cms/pages';
            }
        },
        computed:{

            ...mapGetters([
                'pageData',
            ])
        }
    }
</script>

<style scoped>

</style>
