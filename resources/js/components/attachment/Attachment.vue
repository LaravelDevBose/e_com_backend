<template>
    <div id="attachment">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" class="hidden" ref="files" :multiple="multi_file" id="file_upload"  @change="uploadFile">
                    <label for="file_upload" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left"></i> Select File</label>
                </div>
            </div>
        </div>
        <div class="row" v-if="attachmentData">
            <div class="col-lg-4 col-sm-4" v-for="(attachment, index) in attachmentData" :key="attachment.id">
                <div class="thumbnail">
                    <div class="thumb">
                        <img :src="attachment.img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions } from 'vuex'

    export default {
        props:['multi_file', 'folder'],
        name: "Attachment",
        data(){
            return{
                attachmentData:[],
            }
        },
        created() {

        },
        methods:{
            ...mapActions([
                'uploadAttachment'
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
                     vm.uploadAttachment(formData);
                 },1000);

            },



        },
        computed:{
            ...mapGetters([
                'attachments'
            ]),
            checkAttachmentsData(){
                return JSON.parse(JSON.stringify(this.attachments));
            }
        },
        watch:{
            checkAttachmentsData:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        if(this.multi_file === true || this.multi_file === 'true' || this.multi_file === 1){
                            if(this.attachments.length > 1){
                                delete this.attachmentData[0];
                                this.attachmentData[0]=this.attachments[0];
                            }else{
                                this.attachmentData = this.attachments;
                            }
                        }else{
                            this.attachmentData = this.attachments;
                        }
                    }

                }
            },
        }

    }
</script>

<style scoped>

</style>
