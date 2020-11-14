<template>
    <!-- Content area -->
    <div class="content" >
        <div class="row">
            <div class="col-md-4">
                <!-- Combination and connection -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Top Browser Report</h5>
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
                                v-if="topBrowsers.load"
                                :chart-data="topBrowsers.data"
                                :chart-colors="topBrowsers.colors"
                                :chart-labels="topBrowsers.labels"
                            ></pie-chart>
                        </div>
                    </div>
                </div>
                <!-- /combination and connection -->
            </div>
            <div class="col-md-4">
                <!-- Combination and connection -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">User Bounce Report</h5>
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
                                v-if="userBounce.load"
                                :chart-data="userBounce.data"
                                :chart-labels="userBounce.labels"
                            ></pie-chart>
                        </div>
                    </div>
                </div>
                <!-- /combination and connection -->
            </div>
            <div class="col-md-4">
                <!-- Combination and connection -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"> This Week and Prv Week Visitor</h5>
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
                                v-if="weeklyVisitors.load"
                                :chart-data="weeklyVisitors.data"
                                :chart-labels="weeklyVisitors.labels"
                            ></line-chart>
                        </div>
                    </div>
                </div>
                <!-- /combination and connection -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Combination and connection -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">This Month and Prv Month Visitor Summary</h5>
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
                                v-if="monthlyVisitors.load"
                                :chart-data="monthlyVisitors.data"
                                :chart-labels="monthlyVisitors.labels"
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
                        <h5 class="panel-title">This Year and Prv Year Visitor Summary</h5>
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
                                v-if="yearlyVisitors.load"
                                :chart-data="yearlyVisitors.data"
                                :chart-labels="yearlyVisitors.labels"
                            ></bar-chart>
                        </div>
                    </div>
                </div>
                <!-- /combination and connection -->
            </div>
        </div>
    </div>
    <!-- /content area -->
</template>

<script>
import {mapActions} from 'vuex';
import BarChart from "../chart/BarChart";
import PieChart from "../chart/PieChart";
import LineChart from "../chart/LineChart";
export default {
    name: "AnalyticReportPage",
    components: {LineChart, PieChart, BarChart},
    data(){
        return{
            topBrowsers:{
                data:[],
                colors:[],
                labels: [],
                load: false,
            },
            userBounce:{
                data:[],
                colors:[],
                labels: [],
                load: false,
            },
            weeklyVisitors:{
                data:[],
                labels: [],
                load: false,
            },
            monthlyVisitors:{
                data:[],
                labels: [],
                load: false,
            },
            yearlyVisitors:{
                data:[],
                labels: [],
                load: false,
            },
        }
    },
    mounted() {
        this.getYearlyVisitorAnalyticData()
            .then(({data})=>{
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.yearlyVisitors.labels= data.data.labels;
                    data.data.datasets.map(barData=>{
                        let dataSet ={
                            label: barData.label,
                            borderColor: barData.bgColor,
                            data: barData.data,
                            fill: false,
                            backgroundColor: 'transparent',
                        };
                        this.yearlyVisitors.data.push(dataSet);

                    });
                    this.yearlyVisitors.load = true;
                }
            });
        this.getMonthlyVisitorAnalyticData()
            .then(({data})=>{
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.monthlyVisitors.labels= data.data.labels;
                    data.data.datasets.map(barData=>{
                        let dataSet ={
                            label: barData.label,
                            borderColor: barData.bgColor,
                            data: barData.data,
                            fill: false,
                            backgroundColor: barData.bgColor,
                        };
                        this.monthlyVisitors.data.push(dataSet);

                    });
                    this.monthlyVisitors.load = true;
                }
            });
        this.getWeeklyVisitorAnalyticData()
            .then(({data})=>{
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.weeklyVisitors.labels= data.data.labels;
                    data.data.datasets.map(barData=>{
                        let dataSet ={
                            label: barData.label,
                            borderColor: barData.bgColor,
                            data: barData.data,
                            fill: false,
                            backgroundColor: 'transparent',
                        };
                        this.weeklyVisitors.data.push(dataSet);

                    });
                    this.weeklyVisitors.load = true;
                }
            });
        this.getTopBrowsersAnalyticData()
            .then(({data})=>{
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.topBrowsers.labels= data.data.labels;
                    data.data.datasets.map(dataSet=>{
                        this.topBrowsers.data.push(dataSet.data);
                    });
                    this.topBrowsers.load = true;
                }
            });
        this.getUserBonceAnalyticData()
            .then(({data})=>{
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.userBounce.labels= data.data.labels;
                    data.data.datasets.map(dataSet=>{
                        this.userBounce.data.push(dataSet.data);
                    });
                    this.userBounce.load = true;
                }
            });
    },
    methods:{
        ...mapActions([
            'getYearlyVisitorAnalyticData',
            'getMonthlyVisitorAnalyticData',
            'getWeeklyVisitorAnalyticData',
            'getTopBrowsersAnalyticData',
            'getUserBonceAnalyticData'
        ])
    }
}
</script>

<style scoped>

</style>
