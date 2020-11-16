<template>
    <div id="page-body">
        <page-header></page-header>
        <router-view></router-view>
        <page-footer></page-footer>

        <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a>
    </div>
</template>

<script>
import PageHeader from "./components/PageHeader";
import PageFooter from "./components/PageFooter";
import {mapGetters, mapActions} from 'vuex';
import 'vuejs-noty/dist/vuejs-noty.css'
export default {
    name: "MainApp",
    components: {PageHeader, PageFooter},
    created() {
        this.getLocalStorageWishList();
    },
    methods:{
        showNotification(data){
            if(data.type === 'Success'){
                this.$noty.success(data.message);
            }else if(data.type === 'Error'){
                this.$noty.error(data.message);
            }else if(data.type === 'Warning'){
                this.$noty.warning(data.message);
            }else {
                this.$noty.info(data.message);
            }

        },
        ...mapActions(['getLocalStorageWishList'])
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
            }, deep: true,
        }
    }
}
</script>

<style scoped>

</style>
