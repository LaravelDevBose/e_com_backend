<template>
    <div id="ShowCampaign">
        <!-- Content area -->
        <div class="content">
            <div class="panel">
                <div class="panel-body">
                    <div class="content-group-lg">
                        <div class="content-group text-center">
                            <a href="#" class="display-inline-block">
                                <img :src="image" class="img-responsive" alt="">
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


                    </div>

                </div>
            </div>
            <div class="panel" >
                <div class="panel-heading bg-teal-700">
                    <h5 class="panel-title">Add Campaign Products</h5>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered dataTable-basic">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Job Title</th>
                                <th>DOB</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="width: 15px;">1</td>
                                <td style="width: 70px">
                                    <a href="#">
                                        <img :src="image" height="60" class="" alt="">
                                    </a>
                                </td>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="label label-success">Active</span></td>
                            </tr>
                            <tr>
                                <td style="width: 15px">2</td>
                                <td style="width: 70px">
                                    <a href="#">
                                        <img :src="image" height="60" class="" alt="">
                                    </a>
                                </td>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="label label-success">Active</span></td>
                            </tr>
                            <tr>
                                <td style="width: 15px">3</td>
                                <td style="width: 70px">
                                    <a href="#">
                                        <img :src="image" height="60" class="" alt="">
                                    </a>
                                </td>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="label label-success">Active</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->
    </div>
</template>

<script>
    export default {
        name: "ShowCampaign",
        data(){
            return{
                image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg'
            }
        }
    }
</script>

<style scoped>

</style>