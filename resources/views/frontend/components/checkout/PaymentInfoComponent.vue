<template>
    <div class="box-border">
        <div class="row">
            <!--<div class="col-md-6">
                <ul>
                    <li>

                        <h3>Payment With</h3>
                    </li>
                    <li>
                        <button type="button" class="btn pay-btn shadow ">
                            <img :src="$baseUrl='/images/bkash.png'" alt="">
                        </button>
                    </li>
                </ul>
            </div>-->
            <div class="col-md-6">
                <div class="box-border">
                    <h3>Thank You. Your Order Successfully Complete.</h3>
                    <p><strong>Invoice No: {{ orderData.order_no }}</strong></p>
                </div>
            </div>
        </div>
        <button class="button" @click.prevent="gotoPage('/')">Continue Shopping</button>
        <button class="button pull-right" @click.prevent="gotoPage('/buyer/dashboard')">Dashboard</button>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name: "PaymentInfoComponent",
    beforeDestroy(){
        this.updateActiveSection(1);
    },
    methods:{
        ...mapActions([
            'getBKashAccessToken',
            'bkashCreateRequest',
            'bkashExecuteRequest',
            'updateActiveSection'
        ]),
        gotoPage(url){
            this.$router.push(url);
        },
        bkashPaymentInit(){
            this.getBKashAccessToken()
            .then(response=>{
                bKash.init({
                    paymentMode: 'checkout',
                    paymentRequest: paymentRequest,
                    createRequest: function(request){
                        this.bkashCreateRequest()
                            .then(response=>{
                                bKash.create().onSuccess(response);
                            }).catch(error=>{
                                bKash.create().onError();
                            })
                    },
                    executeRequestOnAuthorization: function(){
                        this.bkashExecuteRequest()
                            .then(response=>{

                            }).catch(error=>{
                                bKash.execute().onError();
                            })
                    }
                });
            });

        }
    },
    computed:{
        ...mapGetters(['orderData'])
    }
}
</script>

<style scoped>
    .pay-btn{
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        background: #fff;
        border: 1px solid #eaeaea;
        color: #fff;
        padding: 5px 10px;
        height: auto;
    }
    .pay-btn:hover{
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        background: #fff;
        border: 1px solid #eaeaea;
    }
</style>
