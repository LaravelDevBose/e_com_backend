<template>
    <div class="header-top">
        <div class="container">

            <ul class="nav-left">
                <li>Hotline: {{ companyInfo.contact_mobile !== ''? companyInfo.contact_mobile : '' }}</li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i> {{ companyInfo.contact_email !== ''? companyInfo.contact_email : '' }}</li>
            </ul>
            <ul class="nav-right" v-if="pages && pages.length > 0">
                <li v-for="page in pages.slice(0, 4)" :key="page.slug">
                    <router-link :to="{name: 'page', params:{slug: page.slug}}">
                        {{ page.menuTitle }}
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
export default {
    name: "HeaderTop",
    created() {
        this.getCompanyInfo();
    },
    methods:{
        ...mapActions(['getCompanyInfo'])
    },
    computed:{
        ...mapGetters(['pages', 'companyInfo'])
    }
}
</script>

<style scoped>

</style>
