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
                                <input type="text" v-model="formData.trans_ads_title" class="form-control" placeholder="Trans Title" required>
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
            isEdit: {
                type: Number,
                default: 0,
            }
        },
        data (){
            return {
                formData:{
                    ads_title:'',
                    trans_ads_title:'',
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
        methods:{
            ...mapActions([]),
            adsBannerStore(){

            }
        }
    }
</script>

<style scoped>

</style>
