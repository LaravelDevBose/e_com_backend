<template>
    <div id="ShowCampaign">
        <!-- Content area -->
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h5 class="panel-title">Campaign Details</h5>
                        </div>
                        <div class="panel-body">

                            <div class="content-group text-center">
                                <img :src="image" class="img-responsive img-thumbnail" alt="" style="width:100%; max-height:250px;">
                            </div>

                            <h3 class="text-semibold mb-5">
                                <a href="#" class="text-purple">Although moreover mistaken kindness</a>
                            </h3>

                            <ul class="list-inline list-inline-separate list-unstyled text-muted content-group">
                                <li>
                                    <i class="icon-calendar52 text-info position-left"></i>July 5th, 2016
                                </li>
                                <li>
                                    <i class="icon-calendar52 text-info position-left"></i>July 5th, 2016
                                </li>
                                <li>
                                    <span class="label label-info">Live</span>
                                </li>
                            </ul>
                            <p class="text-default">asdfasdfasdf asldfasdfjasdkf asdfklasdjfkl asdfjlkasdjf asdjflkasdjfkl asdjfklasdjfsd f</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h5 class="panel-title">Campaign Sale Chart</h5>

                        </div>

                        <div class="panel-body">

                            <div class="chart-container">
                                <h3>Campaign Chart View</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel" >
                <div class="panel-heading bg-teal-700">
                    <h5 class="panel-title">Add Campaign Products</h5>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered datatable-multi-sorting">
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
