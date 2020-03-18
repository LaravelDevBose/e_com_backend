<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Create Ads Banner</h5>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="adsBannerStore">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <label>Ads Title:</label>
                                <input type="text" v-model="formData.ads_title" class="form-control" placeholder="Ads Title" required>
                            </div>
                            <div class="form-group">
                                <label>Ads Trans. Title:</label>
                                <input type="text" v-model="formData.ads_trans_title" class="form-control" placeholder="Trans Title" required>
                            </div>
                            <div class="form-group">
                                <label>Ads Url:</label>
                                <input type="text" v-model="formData.ads_url" class="form-control" placeholder="Ads Url" >
                            </div>
                            <div class="content-group-lg">
                                <label>Ads Status:</label>
                                <div class="form-group">
                                    <label class="checkbox-style" for="paypal_payment">
                                        <span class="text-bold text-success" v-if="formData.ads_status">Active</span>
                                        <span class="text-bold text-warning" v-else>Inactive</span>
                                        <input type="checkbox" id="paypal_payment" v-model="formData.ads_status"  :checked="formData.ads_status">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div v-if="id !== 0 && isedit === 1" class="form-group">
                                <label>Ads Banner:</label>
                                <br>
                                <img v-if="adsBanner.image" :src="adsBanner.image.image_path" style="max-width: 285px;" class="img img-thumbnail img-responsive">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Expired Date:</label>
                                <datetime
                                    type="datetime"
                                    use12-hour
                                    v-model="formData.ads_expired"
                                    input-id="endDate"
                                    input-class="form-control"
                                    :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                    :week-start="6"
                                >
                                </datetime>
                                <strong v-if="id !== 0 && isedit === 1" class="text-bold text-teal">Expired At: {{ formData.ads_expired }}</strong>
                            </div>
                            <div class="form-group">
                                <label>Ads Position:</label>
                                <select v-model="formData.ads_position"  class="form-control" required>
                                    <option v-for="(position, index) in positions" :value="index" :key="index">{{ position }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ads Image:</label>
                                <single-attachment :folder="'ads_banner'"></single-attachment>
                                <span class="text-help text-warning">The Best Image Size is (285 X 385). Must Try Width as 285 PX</span>
                            </div>

                        </div>
                        <div class="col-md-3 col-md-offset-6">
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">Save Ads <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import VueSelect2 from '../helper/Select2';
    import SingleAttachment from "../attachment/SingleAttachment";
    export default {
        name: "AdsBannerCreate",
        components:{
            SingleAttachment,
            'vue-select2':VueSelect2,
        },
        props: {
            positions:{
                type: Object,
                default: [],
            },
            isedit: {
                type: Number,
                default: 0,
            },
            id: {
                type: Number,
                default: 0,
            }
        },
        data (){
            return {
                formData:{
                    id:'',
                    ads_title:'',
                    ads_trans_title:'',
                    ads_url:'',
                    ads_position:1,
                    ads_expired:'',
                    ads_status:'',
                    attachment_id:'',
                },
                removeImage:false,
                btnDisabled:false,
            }
        },
        mounted() {
            if(this.isedit !== 0 && this.isedit === 1 && this.id !== 0){
                this.getAdsBanner(this.id);
            }
        },
        methods:{
            ...mapActions([
                'storeAdsBanner',
                'getAdsBanner',
                'updateAdsBanner'
            ]),
            adsBannerStore(){
                this.btnDisabled = true;
                if(this.id !== 0 && this.isedit === 1){
                    if(this.attachmentId !== ''){
                        this.formData.attachment_id = this.attachmentId;
                    }

                    this.updateAdsBanner(this.formData)
                        .then(response=> {
                            if(response.code === 200){
                                Notify.success(response.message);
                                if(response.hasOwnProperty('url')){
                                    setTimeout(()=>{
                                        location.href = response.url;
                                    }, 1200);
                                }
                            } else if(response.code === 406){
                                Notify.warning(response.message)
                            }else {
                                Notify.error('Invalid Information.')
                            }
                        })
                        .catch(error=> {
                            console.log(error)
                        })
                } else {
                    this.formData.attachment_id = this.attachmentId;
                    this.storeAdsBanner(this.formData)
                        .then(response=> {
                            if(response.code === 200){
                                Notify.success(response.message);
                                if(response.hasOwnProperty('url')){
                                    setTimeout(()=>{
                                        location.href = response.url;
                                    }, 1200);
                                }
                            } else if(response.code === 406){
                                Notify.warning(response.message)
                            }else {
                                Notify.error('Invalid Information.')
                            }
                        })
                        .catch(error=> {
                            console.log(error)
                        })
                }
            }
        },
        computed:{
            ...mapGetters([
                'attachmentId',
                'adsBanner'
            ]),
            checkFormData(){
                return JSON.parse(JSON.stringify(this.formData))
            },
            checkAdsBanner(){
                return JSON.parse(JSON.stringify(this.adsBanner))
            }
        },
        watch:{
            checkFormData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            checkAdsBanner:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.formData.id = this.id;
                        this.formData.ads_title = this.adsBanner.ads_title;
                        this.formData.trans_ads_title = this.adsBanner.trans_ads_title;
                        this.formData.ads_url = this.adsBanner.ads_url;
                        this.formData.ads_position = this.adsBanner.ads_position;
                        this.formData.ads_expired = this.adsBanner.ads_expired;
                        this.formData.ads_status = this.adsBanner.ads_status;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
