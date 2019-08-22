<template>
    <div>
        <croppa v-model="cropImage"
                :width="cropperData.width"
                :height="cropperData.height"
                :placeholder="cropperData.placeholder"
                :accept="'image/*'"
                :file-size-limit="cropperData.file_size*kb"
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
        <div style="margin-top:.5rem;">
            <button type="button" class="btn btn-sm bg-teal" @click="rotateImage()" > <i class="icon-rotate-ccw3"></i></button>
            <button type="button" class="btn btn-sm bg-teal" @click="flipY()"> <i class="icon-flip-vertical3"></i></button>
            <button type="button" class="btn btn-sm bg-teal" @click="flipX()"> <i class="icon-flip-vertical4"></i></button>
            <button class="btn btn-sm btn-success" style="float:right;" @click.prevent="upload"> <i class="icon-upload"></i> Upload</button>
            <img :src="imgUrl" alt="">
        </div>
    </div>

</template>

<script>
    import {mapGetters, mapActions } from 'vuex'
    import 'vue-croppa/dist/vue-croppa.css';
    export default {
        name: "ImageCropper",
        props:['cropperData','removeImage'],
        data(){
            return{
                cropImage:'',
                kb:'1048576‬',
                imgUrl:'',
                uploaded:false,
            }
        },
        created(){

        },
        methods:{
            ...mapActions([
                'uploadCropImage'
            ]),
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
                Notify.warning('Maximum Image Size: '+(this.cropperData.file_size/1024).toFixed(2) +' MB');
                return;
            },
            handleCroppaFileTypeMismatch(){
                Notify.warning('File Type Not Match. Use .jpge , .jpg');
                return;
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
                    alert('no image to upload')
                    return
                }


                this.cropImage.generateBlob((blob) => {
                    let Imgurl = this.cropImage.generateDataUrl();
                    let fromData = {
                        'image':Imgurl,
                        'folder':this.cropperData.folder
                    };
                    this.uploadCropImage(fromData)
                        .then(response=>{
                            if(response.code === 200){
                                this.uploaded= true;
                                Notify.success('Image Upload Successfully');
                            }else{
                                Notify.info(response.message);
                            }
                    });

                })
            },

        },
        computed:{
            ...mapGetters([
                'attachments'
            ])


        },
        watch:{
            removeImage:function(value){
                if(value === true){
                    this.cropImage.remove();
                    return value;
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
