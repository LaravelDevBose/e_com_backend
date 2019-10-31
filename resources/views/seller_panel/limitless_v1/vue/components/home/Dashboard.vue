<template>
    <!-- Content area -->
    <div class="content" >
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Latest posts -->
                <div class="panel panel-flat bounceInRight" >
                    <div class="panel-body">
                        <h1 class="text text-blue  text-center text-bold">
                            <span> Well come to Seller Panel
                            </span>
                        </h1>
                    </div>
                </div>
                <!-- /latest posts -->

            </div>

        </div>
        <!-- /dashboard content -->
    </div>
    <!-- /content area -->
</template>

<script>
    export default {
        name: "Dashboard",
        data(){
            return{

            }
        },
        created(){
            console.log(AppStorage.getUserInfo());
        }
    }
</script>

<style scoped>

</style>
