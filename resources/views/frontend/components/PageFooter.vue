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
                                    <li v-for="page in pages.slice(0, 4)" :key="page.slug">
                                        <router-link :to="{name: 'page', params:{slug: page.slug}}">
                                            {{ page.menuTitle }}
                                        </router-link>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6">

                                <h3 class="title">Useful Links</h3>
                                <ul class="links" v-if="pages && pages.length > 0">
                                    <li v-for="page in pages.slice(5, 9)" :key="page.slug">
                                        <router-link :to="{name: 'page', params:{slug: page.slug}}">
                                            {{ page.menuTitle }}
                                        </router-link>
                                    </li>
                                </ul>

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
import {mapGetters} from 'vuex';
export default {
    name: "PageFooter",
    computed:{
        ...mapGetters(['companyInfo', 'pages'])
    }
}
</script>

<style scoped>
.footer-content{
    background-color: #2D2D2D;
}
</style>
