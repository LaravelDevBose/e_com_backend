<template>
    <div class="content">
        <!-- Widgets list -->
        <div class="row">
            <div class="col-sm-6 col-lg-3" v-if="campaigns" v-for="campaign in campaigns" :key="campaign.id">
                <campaign-grid :campaign="campaign"></campaign-grid>
            </div>
        </div>
    </div>
</template>

<script>
    import CampaignGrid from "./CampaignGrid";
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "CampaignList",
        components: {CampaignGrid},
        data(){
            return{
                reqData:{},
            }
        },
        created() {

        },
        mounted() {
            this.getCampaignList(this.reqData);
        },
        methods:{
            ...mapActions([
                'getCampaignList',
            ])
        },
        computed:{
            ...mapGetters([
                'campaigns',
            ])
        }
    }
</script>

<style scoped>

</style>
