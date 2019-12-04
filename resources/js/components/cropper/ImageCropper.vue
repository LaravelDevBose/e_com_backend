<template>
    <div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
                <div class="form-group">
                    <label @click="modalShow()" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left"></i>Select Image</label>
                </div>
            </div>
            <div
                v-if="!removeImage"

                class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                v-for="(cropImageData,index) in cropImages"
            >
                <div class="form-group" v-if="cropImageData.serial === serial">
                    <img  :src="cropImageData.img" class="img-thumbnail img-responsive" style="max-height: 250px;" alt="">
                    <input type="hidden" :class="modalId" :value="cropImageData.id">
                </div>
            </div>
            <div
                v-if="cropperData.init_image !== '' && cropImages.length === 0"
                class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
            >
                <div class="form-group" v-if="cropperData.serial === serial">
                    <img  :src="cropperData.init_image" class="img-thumbnail img-responsive" style="max-height: 250px;" alt="">
                </div>
            </div>
        </div>

        <div :id="modalId" class="modal fade">
            <div
                class="modal-dialog"
                :class="modalView"
            >
                <div class="modal-content">
                    <div class="modal-header bg-teal">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">{{ cropperData.placeholder}}</h5>
                    </div>
                    <div class="panel-body text-center no-padding-bottom">
                        <croppa v-model="cropImage"
                                :width="cropperData.width"
                                :height="cropperData.height"
                                :placeholder="cropperData.placeholder"
                                :accept="'image/*'"
                                :file-size-limit="fileSizeLimit"
                                :quality="1"
                                :zoom-speed="5"
                                :disabled="uploaded"
                                :disable-drag-and-drop="uploaded"
                                :disable-click-to-choose="uploaded"
                                :disable-drag-to-move="uploaded"
                                :disable-scroll-to-zoom="uploaded"
                                :disable-rotation="uploaded"
                                :prevent-white-space="false"
                                :reverse-scroll-to-zoom="uploaded"
                                :show-remove-button="true"
                                :remove-button-color="'red'"
                                :remove-button-size="20"
                                :initial-image="cropperData.init_image"
                                @file-size-exceed="handleCroppaFileSizeExceed"
                                @file-type-mismatch="handleCroppaFileTypeMismatch"
                                @image-remove="handleImageRemove"
                        ></croppa>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm bg-teal" @click="rotateImage()" > <i class="icon-rotate-ccw3"></i></button>
                        <button type="button" class="btn btn-sm bg-teal" @click="flipY()"> <i class="icon-flip-vertical3"></i></button>
                        <button type="button" class="btn btn-sm bg-teal" @click="flipX()"> <i class="icon-flip-vertical4"></i></button>
                        <button class="btn btn-sm btn-success"  @click.prevent="upload"> <i class="icon-upload"></i> Upload</button>
<!--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters, mapActions } from 'vuex'
    import 'vue-croppa/dist/vue-croppa.css';
    export default {
        name: "ImageCropper",
        props:{
            cropperData:{
                type:[Object],
                default:''
            },
            removeImage:{
                type: [Boolean,Number],
                default: false,
            },
            initImage:{
                type:[String],
                default:'',
            }
        },
        data(){
            return{
                cropImage:'',
                imgUrl:'',
                uploaded:false,
                modalId:'image_modal',
                serial:1,
            }
        },
        created(){
            if (typeof this.cropperData.serial !== "undefined" && this.cropperData.serial !== ''){
                this.serial = this.cropperData.serial;
            }
        },
        mounted(){
            if (typeof this.cropperData.modal_id !== "undefined" && this.cropperData.modal_id !== ''){
                this.modalId = this.cropperData.modal_id;
            }
        },
        methods:{
            ...mapActions([
                'uploadCropImage',
                'resetCropImages',
            ]),
            modalShow(){
                this.removeImage=false;
                $('#'+this.modalId).modal('show');
            },
            rotateImage () {
                this.cropImage.rotate()
            },

            flipX () {
                this.cropImage.flipX()
            },

            flipY () {
                this.cropImage.flipY()
            },

            handleCroppaFileSizeExceed(){
                if(typeof Notify !== "undefined"){
                    Notify.warning('Maximum Image Size: '+(this.cropperData.file_size/1024).toFixed(2) +' MB');
                }else{
                    this.$noty.warning('Maximum Image Size: '+(this.cropperData.file_size/1024).toFixed(2) +' MB');
                }
                return false;
            },
            handleCroppaFileTypeMismatch(){

                if(typeof Notify !== "undefined"){
                    Notify.warning('File Type Not Match. Use .jpge , .jpg');
                }else{
                    this.$noty.warning('File Type Not Match. Use .jpge , .jpg');
                }
                return false;
            },
            handleImageRemove(){
                if(this.removeImage === true){
                    return true;
                }
                let con = confirm('You want to remove ?');
                if(con){
                    this.uploaded = false;
                    return true;
                }{
                    return false;
                }
            },
            upload() {
                if (!this.cropImage.hasImage()) {
                    alert('no image to upload');
                    return
                }

                this.cropImage.generateBlob((blob) => {
                    let Imgurl = this.cropImage.generateDataUrl();
                    let fromData = {
                        'image':Imgurl,
                        'folder':this.cropperData.folder,
                        'serial':this.serial,
                    };
                    this.uploadCropImage(fromData)
                        .then(response=>{
                            if(response.code === 200){
                                this.uploaded= true;
                                if(typeof Notify !== "undefined"){
                                    Notify.success('Image Upload Successfully');
                                }else{
                                    this.$noty.success('Image Upload Successfully');
                                }
                                $('#'+this.modalId).modal('hide');
                            }else{
                                if(typeof Notify !== "undefined"){
                                    Notify.info(response.message);
                                }else{
                                    this.$noty.info(response.message);
                                }

                            }
                    });

                })
            },
            checkModal(index){
                console.log(index);
                console.log(this.cropImages[index]);

                return (this.cropImages[index].modal_id === this.modalId);
            },
        },
        computed:{
            ...mapGetters([
                'cropImages',
                'cropImageIds'
            ]),

            fileSizeLimit(){
                return this.cropperData.file_size*1048576;
            },
            modalView(){
                let modal_view = 'modal-md';
                if (this.cropperData.modal_type === 1){
                    modal_view = 'modal-sm';
                }else if(this.cropperData.modal_type === 2){
                    modal_view = 'modal-md';
                }else if(this.cropperData.modal_type === 3){
                    modal_view = 'modal-lg';
                }else if(this.cropperData.modal_type === 4){
                    modal_view = 'modal-full'
                }else{
                    modal_view = 'modal-md';
                }

                return modal_view;
            }
        },
        watch:{
            removeImage:{
                handler(newVal){
                    if(newVal === true){
                        this.cropImage.remove();
                        this.cropImages.length =  0;
                        this.resetCropImages();
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .croppa-container{
        background-color: #dedede;
        border: 2px solid grey;
        border-radius: 8px;
    }
    .croppa-container:hover {
        opacity: 1;
        background-color: #c0def1;
    }
</style>
