<template>
    <div class="subscribe-area hidden-xs">
        <div class="container">
            <div class="subscribe-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="subscribe">
                            <div class="subscribe-title">
                                <label>Sign Up for Our Newsletter:</label>
                            </div>
                            <form id="subscribe-form" method="post" action="#" @submit.prevent="newsLetterSubscription()">
                                <div class="subscribe-content">
                                    <input type="text" id="subscribe-input" name="email" v-model="formData.email_address">
                                    <button class="button" type="submit"><span>Subscribe</span></button>
                                </div>
                            </form>
                        </div>
                        <div class="subscribe-text-link">
                            <div class="subscribe-link">
                                <ul class="social-link">
                                    <li><a href="https://www.facebook.com/SaliimOnline" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/SaliimOnline" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/saliimonline" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex'
    export default {
        name: "NewsLetterSection",
        data(){
            return {
                formData:{
                    email_address:''
                }
            }
        },
        methods:{
            ...mapActions([
                'subscribeNewsletter'
            ]),

            newsLetterSubscription(){
                this.subscribeNewsletter(this.formData)
                .then( response =>{
                    if(typeof response.code !== "undefined" && response.code === 200){
                        this.$noty.success(response.message);
                        this.formData.email_address = '';
                    }else if(response.status === 'validation'){
                        this.$noty.warning(response.message);
                    }else{
                        this.$noty.error('Something Wrong. Try Again');
                    }
                })
            }
        }
    }
</script>

<style scoped>
    #subscribe-input {
        margin: 0px!important;
    }
</style>
