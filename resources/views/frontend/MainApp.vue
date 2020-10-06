<template>
    <div id="page-body">
        <page-header></page-header>
        <router-view :key="$route.fullPath"></router-view>
        <page-footer></page-footer>

        <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a>
    </div>
</template>

<script>
import PageHeader from "./components/PageHeader";
import PageFooter from "./components/PageFooter";
import {mapGetters} from 'vuex';
import VueNoty from "../../js/helper/Noty";
export default {
    name: "MainApp",
    components: {PageHeader, PageFooter},
    methods:{
        showNotification(data){
            VueNoty.show(data.message, data.type);
        }
    },
    computed:{
        ...mapGetters(['responseInfo']),
        checkGetResponseData(){
            return JSON.parse(JSON.stringify(this.responseInfo));
        }
    },
    watch:{
        checkGetResponseData:{
            handler(newValue, oldValue){
                if (newValue !== oldValue){
                    this.showNotification(this.responseInfo);
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
