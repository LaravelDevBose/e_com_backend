<template>

    <div class="thumbnail">
        <div class="thumb">
            <img :src="campaing.attachment.image_path" alt="">
            <div class="caption-overflow">
                <span>
                    <a href="#" class="btn btn-flat border-white text-white">Details</a>
                    <a href="#" class="btn btn-flat border-white text-white">Join</a>
                </span>
            </div>
        </div>

        <div class="caption">
            <div class="content-group-sm media">
                <div class="media-body">
                    <h6 class="text-semibold no-margin">
                        <a href="#" class="text-default">Data Governance</a>
                    </h6>

                    <small class="text-muted">by <a href="#">Eugene Kopyov</a></small>
                </div>

                <h6 class="text-success media-right no-margin-bottom text-semibold">$49.99</h6>
            </div>

            Way extensive and dejection get delivered deficient sincerity gentleman age. Calling offence six joy feeling <a href="#">[...]</a>
        </div>

        <div class="panel-footer panel-footer-transparent">
            <div class="heading-elements">
                <ul class="list-inline list-inline-separate heading-text">
                    <li><i class="icon-comment position-left"></i> 384</li>
                </ul>

                <span class="heading-text pull-right">
                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                    <span class="text-muted position-right">(49)</span>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CampaignGrid",
        props:['campaign']
    }
</script>

<style scoped>

</style>
