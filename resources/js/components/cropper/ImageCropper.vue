<template>
    <div>
        <croppa v-model="cropImage"
                :width="cropperData.width"
                :height="cropperData.height"
                :placeholder="cropperData.placeholder"
                :accept="'image/*'"
                :file-size-limit="cropperData.file_size*kb"
                :quality="2"
                :zoom-speed="5"
                :disabled="false"
                :disable-drag-and-drop="false"
                :disable-click-to-choose="false"
                :disable-drag-to-move="false"
                :disable-scroll-to-zoom="false"
                :disable-rotation="false"
                :prevent-white-space="false"
                :reverse-scroll-to-zoom="false"
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
        </div>
    </div>

</template>

<script>
    import {mapGetters, mapActions } from 'vuex'

    export default {
        name: "ImageCropper",
        props:['cropperData'],
        data(){
            return{
                cropImage:'',
                kb:'1048576‬',
            }
        },
        created(){

        },
        methods:{
            ...mapActions([
                'uploadAttachment'
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
                let con = confirm('You want to remove ?');
                if(con){
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
                    console.log(blob);
                    var fd = new FormData();
                    fd.append('0', blob,'filename.jpg');
                    fd.append('folder', this.cropperData.folder);

                    let vm = this;
                    setTimeout(()=>{
                        vm.uploadAttachment(fd);
                    },1000);
                })
            }
        },
        computed:{
            ...mapGetters([
                'attachments'
            ])
        }
    }
</script>

<style scoped>
    .croppa-container {
        background-color: lightblue;
        border: 2px solid grey;
        border-radius: 8px;
    }

    .croppa-container:hover {
        opacity: 1;
        background-color: #8ac9ef;
    }
</style>
