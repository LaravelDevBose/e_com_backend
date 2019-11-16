<template>

    <div class="thumbnail">
        <div class="thumb">
            <img :src="campaign.attachment.image_path" alt="">
            <div class="caption-overflow">
                <span>
                    <a href="#" @click.prevent="showDetails(campaign.slug)" class="btn btn-flat border-white text-white">Details</a>
                    <a href="#" v-if="campaign.status ===1 " @click.prevent="joinCampaign(campaign.slug)" class="btn btn-flat border-white text-white">Join</a>
                </span>
            </div>
        </div>

        <div class="caption">
            <div class="content-group-sm media">
                <div class="media-body">
                    <h6 class="text-semibold no-margin">
                        <a href="#" class="text-default">{{ campaign.title }}</a>
                    </h6>
                </div>
                <h6 class="text-success media-right no-margin-bottom text-semibold" v-html="status_view">

                </h6>
            </div>
            <div class="row text-center">
                <div class="col-xs-4">
                    <h5 class="text-semibold no-margin">{{ campaign.reg_date}}</h5>
                    <span class="text-muted text-size-small">Reg. Date</span>
                </div>

                <div class="col-xs-4">
                    <h5 class="text-semibold no-margin">{{ campaign.start_date }}</h5>
                    <span class="text-muted text-size-small">Start Date</span>
                </div>

                <div class="col-xs-4">
                    <h5 class="text-semibold no-margin">{{ campaign.end_date }}</h5>
                    <span class="text-muted text-size-small">End Date</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CampaignGrid",
        props:['campaign'],
        methods:{
            showDetails(slug){
                location.href = `/seller/campaign/${slug}/show`
            },
            joinCampaign(slug){
                location.href = `/seller/campaign/${slug}/join/`
            }
        }
    }
</script>

<style scoped>

</style>
