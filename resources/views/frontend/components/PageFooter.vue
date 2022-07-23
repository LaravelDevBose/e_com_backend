<template>
    <!-- FOOTER -->
    <footer class="site-footer footer-opt-3">
        <div class="footer-content" >
            <div class="footer-column">
                <div class="container">

                    <div class="footer-column1">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-sm-6">
                                <h3 class="title">INFORMATION</h3>
                                <table class="address">
                                    <tr>
                                        <td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
                                        <td>{{ companyInfo.contact_address !== ''? companyInfo.contact_address : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-phone" aria-hidden="true"></i></td>
                                        <td>{{ companyInfo.contact_phone !== ''? companyInfo.contact_phone : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                                        <td>{{ companyInfo.contact_email !== ''? companyInfo.contact_email : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-mobile" aria-hidden="true"></i></td>
                                        <td>Hotline: {{ companyInfo.contact_mobile !== ''? companyInfo.contact_mobile : '' }}</td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6">

                                <h3 class="title">About Us</h3>
                                <p v-html="companyInfo.about_us !== '' ? companyInfo.about_us :''"></p>

                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6">

                                <h3 class="title">Useful Links</h3>
                                <ul class="links" v-if="pages && pages.length > 0">
                                    <li v-for="page in pages" :key="page.slug">
                                        <router-link :to="{name: 'page', params:{slug: page.slug}}">
                                            {{ page.menuTitle }}
                                        </router-link>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-md-3 col-lg-3 col-xs-6 col">
                                <div class="block-newletter" style="background-color: #2d2d2d!important;">
                                    <div class="block-title">NEWSLETTER</div>
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
                                    <div class="block-title">Let’s Socialize </div>
                                    <div class="block-content">
                                        <a href="" class="sh-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                        <a href="" class="sh-pinterest"><i class="fab fa-youtube"></i></a>
                                        <a href="" class="sh-google"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="footer-column2">

                        <div class="copyright">

                            Copyright © 2015 KuteShop. All Rights Reserved. Designed by: KuteThemes

                        </div>

                        <div class="payment copyright">
                            <p>Powered by: Brainchild Software</p>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </footer>
    <!-- end FOOTER -->
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name: "PageFooter",
    computed:{
        ...mapGetters(['companyInfo', 'pages'])
    },
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
.footer-content{
    background-color: #2D2D2D;
}
</style>
