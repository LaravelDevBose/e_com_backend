<template>
    <div id="ImportData">
        <div id="modal_import_file" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-indigo-400">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Excel Or CVC File Import</h5>
                    </div>

                    <form action="" method="post" class="form-horizontal" @submit.prevent="uploadImportFile">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5 col-xs-12">
                                    <div class="form-group">
                                        <input type="file" class="hidden" ref="ImportFile"  id="file_upload" accept=".xlsx, .xls, .csv" @change="addToFormData">
                                        <label for="file_upload" class="btn btn-info btn-md btn-block"><i class="icon-file-excel text-left"></i> Select File</label>
                                    </div>
                                </div>
                                <div class="col-md-5 col-xs-12">
                                    <h5>Here is an example of what your csv should look like:</h5>
                                    <img :src="example_image" class="img-responsive">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        props:['upload_url','example_image', 'example_file'],
        name: "ImportData",
        data(){
            return{
                formData:new FormData(),
            }
        },
        methods:{

            ...mapActions(['importData']),

            addToFormData(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;

                this.formData.append('excel_file', files[0]);
            },
            uploadImportFile(e){
                e.preventDefault();
                //TODO Validation
                let form = {
                    url:this.upload_url,
                    formData: this.formData,
                };

                this.importData(form)
                    .then(response=>{
                        //success message and modal close and data show
                        if(response.status === "success"){
                            alert(response.message);
                            setTimeout(function () {
                                $('#modal_import_file').modal('hide');
                            },1000);
                        }

                    })
                    .catch(error=>{
                            alert(error.message);
                    })

            }
        }
    }
</script>

<style scoped>

</style>