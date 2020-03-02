<template>
    <div id="attachment">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" class="hidden" ref="files" id="file_upload"  @change="uploadFile">
                    <label for="file_upload" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left"></i> Select File</label>
                </div>
            </div>
        </div>
        <div class="row" v-if="singleAttachment">
            <div class="col-lg-4 col-sm-4">
                <div class="thumbnail">
                    <div class="thumb">
                        <img :src="singleAttachment.img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions } from 'vuex'

    export default {
        props:['folder'],
        name: "SingleAttachment",
        data(){
            return{
                attachmentData:[],
            }
        },
        created() {

        },
        methods:{
            ...mapActions([
                'uploadSingleAttachment'
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

                let vm = this;
                 setTimeout(()=>{
                     vm.uploadSingleAttachment(formData);
                 },500);

            },



        },
        computed:{
            ...mapGetters([
                'singleAttachment'
            ]),
        }
    }
</script>

<style scoped>

</style>
