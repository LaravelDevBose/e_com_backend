<template>
    <div class="content">

        <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">

                <!-- Post -->
                <div class="panel">
                    <div class="panel-body">
                        <div class="content-group-lg">
                            <div class="content-group text-center">
                                <a href="#" class="display-inline-block">
                                    <img src="assets/images/cover.jpg" class="img-responsive" alt="">
                                </a>
                            </div>

                            <h3 class="text-semibold mb-5">
                                <a href="#" class="text-default">Although moreover mistaken kindness me feelings do be marianne</a>
                            </h3>

                            <ul class="list-inline list-inline-separate text-muted content-group">
                                <li>By <a href="#" class="text-muted">Eugene</a></li>
                                <li>July 5th, 2016</li>
                                <li><a href="#" class="text-muted">12 comments</a></li>
                                <li><a href="#" class="text-muted"><i class="icon-heart6 text-size-base text-pink position-left"></i> 281</a></li>
                            </ul>

                            <div class="content-group">

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /post -->
            </div>
        </div>
        <!-- /detached content -->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        props:['id'],
        name: "ShowGeneralPages",
        data(){
            return{

            }
        },
        created() {

            this.singleGeneralPageData(this.id);
        },
        computed:{
            ...mapActions([
                'singleGeneralPageData'
            ]),
            ...mapGetters([
                'pageData',
            ])
        }
    }
</script>

<style scoped>

</style>
