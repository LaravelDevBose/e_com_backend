<template>
    <div class="content">
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Slider List</h5>
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
                        <th style="padding:5px;">Slider Title</th>
                        <th>Sub Title</th>
                        <th>Slider Button</th>
                        <th>Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="slidersData" v-for="(slider , index) in slidersData" :key="slider.id">
                        <td>{{ index }}</td>
                        <td>
                            <span class="text text-bold"> {{ slider.title }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ slider.subTitle }}</span>
                        </td>
                        <td>
                            <p class="text text-bold"> Text: {{ slider.btnText }}</p>
                            <a :href="slider.btnUrl" class="text text-small">Url: {{ slider.btnUrl}}</a>
                        </td>
                        <td style="padding:5px; width:200px;">
                            <img v-if="slider.attachment" :src="slider.attachment.image_path" :alt="slider.title" class="img-preview img-responsive" style="width:200px; height:100px;" >
                        </td>

                        <td class="text text-center">
                            <span class="badge badge-success" v-if="slider.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="sliderDelete(slider.id)"><i class="icon-trash"></i></a></li>
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
    import ImageCropper from "../../cropper/ImageCropper";

    export default {
        name: "SliderPage",
        components: {ImageCropper},
        data(){
            return {

            }
        },
        created() {
            this.getSliders();
        },
        methods:{
            ...mapActions([
                'getSliders',
                'deleteSlider',
            ]),
            sliderDelete(sliderId){
                let conf = confirm('Are You Sure ?');
                if(conf){
                    this.deleteSlider(sliderId)
                        .then(response=>{
                            if(response.code === 200){
                                Notify.success(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        });
                    return true;
                }else{
                    return false;
                }
            }
        },
        computed:{
            ...mapGetters([
                'slidersData',
            ]),
        },
        watch:{

        }
    }
</script>

<style scoped>

</style>
