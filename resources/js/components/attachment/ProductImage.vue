<template>
    <div id="productImage">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" class="hidden" ref="files" :multiple="multi_file" id="file_upload"  @change="uploadFile">
                    <label for="file_upload" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left"></i> Select File</label>
                </div>
            </div>
        </div>
        <div class="row" v-if="productImages[pri_id]">
            <div class="col-xs-4 col-sm-4 col-lg-3" v-for="(attachment, index) in productImages[pri_id]" :key="attachment.id">
                <div class="thumbnail">
                    <div class="thumb">
                        <img :src="attachment.img" alt="">
                        <div class="caption-overflow">
                            <span>
                                <a :href="attachment.img" data-fancybox="images"  class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-eye"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions } from 'vuex'
import { setTimeout } from 'timers';
    export default {
        props:['multi_file', 'folder', 'pri_id'],
        name: "ProductImage",
        data(){
            return{

            }
        },
        created() {

        },
        methods:{
            ...mapActions([
                'uploadProductImage'
            ]),
            uploadFile(e) {
                this.files = this.$refs.files.files;
                var formData;
                formData = new FormData();
                for( var i = 0; i < this.files.length; i++ ){
                    let file = this.files[i];
                    formData.append(i, file);
                }
                formData.append('folder', this.folder);
                formData.append('pri_id', this.pri_id);

                let vm = this;
                 setTimeout(()=>{
                     vm.uploadProductImage(formData)
                         .then(response=>{
                             if(response.status === "success"){

                                 Notify.success(response.message);
                             }else{
                                 Notify.error(response.message);
                             }
                         }).catch(error=>{
                            Notify.error(error.message);
                     });
                 },1000);
                 
            },
            


        },
        computed:{
            ...mapGetters([
                'productImages'
            ])

        }

    }
</script>

<style scoped>

</style>
