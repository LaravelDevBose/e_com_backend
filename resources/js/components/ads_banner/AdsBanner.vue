<template>
    <div class="content">
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Ads Banner List</h5>
                <div class="heading-elements">
                    <a href="/admin/ads_banner/create" type="button" class="btn bg-success btn-sm" > <i class="icon-plus-circle2 position-left"></i> Add New Ads Banner</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="padding:5px;">Ads Title</th>
                        <th>Ads Url</th>
                        <th>Position</th>
                        <th>Expired</th>
                        <th>Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="adsBannerList" v-for="(banner , index) in adsBannerList" :key="index">
                        <td>{{ index }}</td>
                        <td>
                            <span class="text text-bold"> {{ banner.title }}</span><br>
                            <span class="text text-bold" v-if="banner.trans_title"> {{ banner.trans_title }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ banner.url }}</span><br>
                        </td>
                        <td class="text text-center">
                            <span class="badge bg-teal" v-if="banner.position === 1">{{ banner.position_label}}</span>
                            <span class="badge bg-pink" v-else-if="banner.position === 2">{{ banner.position_label}}</span>
                            <span class="badge bg-orange" v-else-if="banner.position === 3">{{ banner.position_label}}</span>
                            <span class="badge bg-violet" v-else-if="banner.position === 4">{{ banner.position_label}}</span>
                            <span class="badge bg-indigo" v-else-if="banner.position === 5">{{ banner.position_label}}</span>
                            <span class="badge bg-slate" v-else>Undefined</span>
                        </td>
                        <td class="text-center">
                            <span class="text text-bold">{{ banner.expired }}</span>
                        </td>
                        <td style="padding:5px; width:200px;">
                            <img v-if="banner.image" :src="banner.image.image_path" :alt="banner.title" class="img-preview img-responsive" style="width:300px; height:150px;" >
                        </td>

                        <td class="text text-center">
                            <span class="badge badge-success" v-if="banner.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>Inactive</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#" @click.prevent="editAdsBanner(banner.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="removeAdsBanner(banner.id)"><i class="icon-trash"></i></a></li>
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
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "AdsBanner",
        mounted(){
            this.getAdsBanners();
        },
        methods:{
            ...mapActions([
                'getAdsBanners',
                'deleteAdsBanner'
            ]),
            editAdsBanner(adsBannerId) {
              location.href = `/admin/ads_banner/${adsBannerId}/edit`
            },
            removeAdsBanner(adsBannerId){

                if(!confirm('Are You Sure.?')){
                    return false;
                }
                this.deleteAdsBanner(adsBannerId)
                .then(response=> {
                    if(response.code === 200){
                        Notify.success(response.message);
                    }else{
                        Notify.error('Something Wrong. Try Again');
                    }
                })
                .catch(error=> {
                    console.log(error);
                    Notify.error('Something Wrong. Try Again!')
                })
            }
        },
        computed: {
            ...mapGetters([
                'adsBannerList'
            ])
        }

    }
</script>

<style scoped>

</style>
