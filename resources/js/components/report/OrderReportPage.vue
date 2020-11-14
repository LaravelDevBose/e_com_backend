<template>
    <!-- Content area -->
    <div class="content" >
        <div class="row">
            <div class="col-md-3">
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
                                v-if="statusOrder.load"
                                :chart-data="statusOrder.data"
                                :chart-colors="statusOrder.colors"
                                :chart-labels="statusOrder.labels"
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
            <div class="col-md-5">
                <div class="row" v-if="statusOrder.load">
                    <div class="col-sm-6 col-md-6" v-for="(item,index) in statusOrder.dataSet" :key="index">
                        <div class="panel panel-body has-bg-image" :style="{'background-color': item.bgColor}">
                            <div class="media no-margin">
                                <div class="media-body">
                                    <h3 class="no-margin text-white">{{ item.data }}/ {{ item.amount }} tk</h3>
                                    <span class="text-uppercase text-size-mini text-white">{{ item.label }}</span>
                                </div>

                                <div class="media-right media-middle text-white">
                                    <i class="icon-stats-bars2 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                v-if="yearlySale.load"
                                :chart-data="yearlySale.data"
                                :chart-labels="yearlySale.labels"
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
import {mapActions} from 'vuex';
import BarChart from "../chart/BarChart";
import PieChart from "../chart/PieChart";
import LineChart from "../chart/LineChart";
export default {
    name: "OrderReportPage",
    components: {LineChart, PieChart, BarChart},
    data(){
        return{
            yearlySale:{
                data:[],
                labels: [],
                load: false,
            },
            statusOrder:{
                data:[],
                colors:[],
                labels: [],
                load: false,
                dataSet:[],
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
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.yearlySale.labels= data.data.labels;
                    data.data.datasets.map(barData=>{
                        let dataSet ={
                            label: barData.label,
                            backgroundColor: barData.bgColor,
                            data: barData.data,
                        };
                        this.yearlySale.data.push(dataSet);

                    });
                    this.yearlySale.load = true;
                }
            });
        this.getStatusWishOrderData()
            .then(({data})=>{
                if(typeof data.code !== "undefined" && data.code === 200){
                    this.statusOrder.labels= data.data.labels;
                    data.data.datasets.map(dataSet=>{
                        this.statusOrder.data.push(dataSet.data);
                        this.statusOrder.colors.push(dataSet.bgColor);
                        this.statusOrder.dataSet.push(dataSet);

                    });
                    this.statusOrder.load = true;
                }
            });
        this.getWeeklySaleData()
            .then(({data})=>{
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
            'getMonthlySaleData',
        ])
    }
}
</script>

<style scoped>

</style>
