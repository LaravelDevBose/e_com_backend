<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-indigo-800">
                <h5 class="panel-title">HomePage Section Details</h5>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text text-semibold"> Title: <span class="text-bold"></span> </h2>
                        <h4 class="text text-semibold"> Type: <span class="text-bold"></span> </h4>
                        <h6 class="text text-semibold"> Position: <span class="text-bold"></span> </h6>
                        <ul>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading bg-indigo-800">
                <h5 class="panel-title">Add Section Products</h5>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "SectionProductPage",
        props:{
            sectionid:[Number]
        },
        data(){
            return{
                formData:{
                    productIds:[],
                    sectionId:'',
                    section_status:0,
                }
            }
        },
        created(){

        },
        mounted(){

        },
        methods:{
            ...mapActions([
                'getSectionData',
            ]),
        },
        computed:{
            ...mapGetters([

            ]),
        }
    }
</script>

<style scoped>

</style>
