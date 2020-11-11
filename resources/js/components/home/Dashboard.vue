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
                            <span> Welcome to Admin Panel
                            </span>
                        </h1>
                    </div>
                </div>
                <!-- /latest posts -->

            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body bg-blue-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-body">
                            <h3 class="no-margin">{{ totalProducts }}</h3>
                            <span class="text-uppercase text-size-mini">total Products</span>
                        </div>

                        <div class="media-right media-middle">
                            <i class="icon-bag icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body bg-success-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-body">
                            <h3 class="no-margin">{{ totalSale}} Tk.</h3>
                            <span class="text-uppercase text-size-mini">total Sale</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-cart-add2 icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body bg-danger-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-body">
                            <h3 class="no-margin">{{ totalCancel}} Tk.</h3>
                            <span class="text-uppercase text-size-mini">total Cancel orders</span>
                        </div>

                        <div class="media-right media-middle">
                            <i class="icon-cart-remove icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body bg-indigo-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-body">
                            <h3 class="no-margin">{{ totalUser}}</h3>
                            <span class="text-uppercase text-size-mini">total Users</span>
                        </div>
                        <div class="media-left media-middle">
                            <i class="icon-users icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->

        <div class="row">
            <div class="col-md-6">
                <!-- Combination and connection -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Status Wish Order Summary</h5>
                        <div class="heading-elements">
                            <!--<ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>-->
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="chart-container">
                            <pie-chart
                                v-if="pie.load"
                                :chart-data="pie.data"
                                :chart-colors="pie.colors"
                                :chart-labels="pie.labels"
                            ></pie-chart>
                        </div>
                    </div>
                </div>
                <!-- /combination and connection -->
            </div>
            <div class="col-md-6">
                <!-- Combination and connection -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">This Week and Prv Week Order Summary</h5>
                        <div class="heading-elements">
                            <!--<ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>-->
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="chart-container">
                            <line-chart
                                v-if="weeklySale.load"
                                :chart-data="weeklySale.data"
                                :chart-labels="weeklySale.labels"
                            ></line-chart>
                        </div>
                    </div>
                </div>
                <!-- /combination and connection -->
            </div>
            <div class="col-md-6">
                <!-- Combination and connection -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">This Month and Prv Month Order Summary</h5>
                        <div class="heading-elements">
                            <!--<ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>-->
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="chart-container">
                            <bar-chart
                                v-if="monthlySale.load"
                                :chart-data="monthlySale.data"
                                :chart-labels="monthlySale.labels"
                            ></bar-chart>
                        </div>
                    </div>
                </div>
                <!-- /combination and connection -->
            </div>
            <div class="col-md-6">
                <!-- Line and bar combination -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">This Year and Prv Year Order Summary</h5>
                        <!--<div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>-->
                    </div>

                    <div class="panel-body">
                        <div class="chart-container">
                            <bar-chart
                                v-if="bar.load"
                                :chart-data="bar.data"
                                :chart-labels="bar.labels"
                            ></bar-chart>
                        </div>
                    </div>
                </div>
                <!-- /line and bar combination -->
            </div>
        </div>
    </div>
    <!-- /content area -->
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
import BarChart from "../chart/BarChart";
import PieChart from "../chart/PieChart";
import LineChart from "../chart/LineChart";
    export default {
        name: "Dashboard",
        components: {LineChart, PieChart, BarChart},
        props:{
            totalProducts:Number,
            totalCancel: Number,
            totalSale:Number,
            totalUser: Number
        },
        data(){
            return{
                bar:{
                    data:[],
                    labels: [],
                    load: false,
                },
                pie:{
                    data:[],
                    colors:[],
                    labels: [],
                    load: false,
                },
                weeklySale:{
                    data:[],
                    labels: [],
                    load: false,
                },
                monthlySale:{
                    data:[],
                    labels: [],
                    load: false,
                },
            }
        },
        mounted() {
            this.getYearlySaleData()
            .then(({data})=>{
                console.log(data);
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.bar.labels= data.data.labels;
                    data.data.datasets.map(barData=>{
                        let dataSet ={
                            label: barData.label,
                            backgroundColor: barData.bgColor,
                            data: barData.data,
                        };
                        this.bar.data.push(dataSet);

                    });
                    this.bar.load = true;
                }
            });
            this.getStatusWishOrderData()
            .then(({data})=>{
                console.log(data);
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.pie.labels= data.data.labels;
                    data.data.datasets.map(dataSet=>{
                        this.pie.data.push(dataSet.data);
                        this.pie.colors.push(dataSet.bgColor);

                    });
                    this.pie.load = true;
                }
            });
            this.getWeeklySaleData()
                .then(({data})=>{
                    console.log(data);
                    if(typeof data.code !== "undefined" && data.code === 200){
                        this.weeklySale.labels= data.data.labels;
                        data.data.datasets.map(barData=>{
                            let dataSet ={
                                label: barData.label,
                                borderColor: barData.bgColor,
                                data: barData.data,
                                fill: false,
                                backgroundColor: 'transparent',
                            };
                            this.weeklySale.data.push(dataSet);

                        });
                        this.weeklySale.load = true;
                    }
                });
            this.getMonthlySaleData()
                .then(({data})=>{
                    console.log(data);
                    if(typeof data.code !== "undefined" && data.code === 200){
                        this.monthlySale.labels= data.data.labels;
                        data.data.datasets.map(barData=>{
                            let dataSet ={
                                label: barData.label,
                                borderColor: barData.bgColor,
                                data: barData.data,
                                fill: false,
                                backgroundColor: barData.bgColor,
                            };
                            this.monthlySale.data.push(dataSet);

                        });
                        this.monthlySale.load = true;
                    }
                });
        },
        methods:{
            ...mapActions([
                'getYearlySaleData',
                'getStatusWishOrderData',
                'getWeeklySaleData',
                'getMonthlySaleData'
            ])
        }
    }
</script>

<style scoped>

</style>
