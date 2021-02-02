<template>
    <div>
        <div class="block-newletter">
            <div class="block-title">SUBSCRIBE</div>
            <div class="block-content">
                <form action="#" method="post" @submit.prevent="newsLetterSubscription()">
                    <div class="input-group">
                        <input type="text" v-model="formData.email_address" class="form-control" placeholder="Your Email Address">
                        <span class="input-group-btn">
                            <button class="btn btn-subcribe" type="submit"><span>ok</span></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="block-social">
            <div class="block-title">Follow Us: </div>
            <div class="block-content">
                <a href="https://www.facebook.com/SaliimOnline" target="_blank" class="sh-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/saliimonline" target="_blank" class="sh-pinterest"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                <a href="https://twitter.com/SaliimOnline" target="_blank" class="sh-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/channel/UCtcvZOgC2qRmRYzGV_MuR2w?fbclid=IwAR1FnyR-OQOvlFdV0hFU_S_8At-1Q5jbxHCvwXUrWvZ_GWQTtVedKXlvd7Q" class="sh-pinterest" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
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

</style>
