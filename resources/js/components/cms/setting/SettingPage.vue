<template>
    <div class="content">
        <div class="panel-group panel-group-control content-group-lg" id="accordion-control">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion-control" href="#contact-info-group1">Contact Information</a>
                    </h6>
                </div>
                <div id="contact-info-group1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form action="" @submit.prevent="contactInformationStore">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Contact No 1:</label>
                                        <input type="text" v-model="settingData.contact_phone" class="form-control" placeholder="Contact No" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No 2:</label>
                                        <input type="text" v-model="settingData.contact_mobile" class="form-control" placeholder="Contact No 2" required>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label>Contact Email:</label>
                                        <input type="text" v-model="settingData.contact_email" class="form-control" placeholder="Contact Email" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group2">Accordion Item #2</a>
                    </h6>
                </div>
                <div id="accordion-control-group2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="" @submit.prevent="contactInformationStore">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Logo:</label>
                                        <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <img v-if="settingData.logo_image" :src="settingData.logo_image" alt="Company Logo">
                                        <img :src="no_logo" alt="No Logo">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group3">Accordion Item #3</a>
                    </h6>
                </div>
                <div id="accordion-control-group3" class="panel-collapse collapse">
                    <div class="panel-body">
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ImageCropper from "../../cropper/ImageCropper";

    export default {
        name: "SettingPage",
        components: {ImageCropper},
        data(){
            return{
                no_logo:'',
                cropperData:{
                    width:200,
                    height:100,
                    placeholder:'Choose a image in 200X100',
                    file_size:1,
                    init_image:'',
                    folder:'setting',
                },
                removeImage:false,
            }
        },
        created() {

        },
        methods:{
            ...mapActions([

            ]),
        },
        computed:{
            ...mapGetters([
                'settingData'
            ])
        },
        watch:{

        }
    }
</script>

<style scoped>

</style>
