<template>
    <div :style="elStyle">
        <div class="day">
            <span class="number">
                {{ days }}<br>
                <div class="format">{{ wordString.day }}</div>
            </span>

        </div>
        <div class="hour">
            <span class="number">
                {{ hours }} <br>
            <div class="format">{{ wordString.hours }}</div>
            </span>

        </div>
        <div class="min">
            <span class="number">
                {{ minutes }}<br>
                <div class="format">{{ wordString.minutes }}</div>
            </span>

        </div>
        <div class="sec">
            <span class="number">
                {{ seconds }}<br>
                <div class="format">{{ wordString.seconds }}</div>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Timer",
    props:{
        starttime: String,
        endtime: String,
        elStyle: {
            type: String,
            default: 'text-align: center; margin: 3px 0'
        }

    },
    data: function(){
        return{
            timer:"",
            wordString: {
                "day":"D",
                "hours":"H",
                "minutes":"M",
                "seconds":"Sec",
                "expired":"Event has been expired.",
                "running":"Till the end of event.",
                "upcoming":"Till start of event.",
                "status": {
                    "expired":"Expired",
                    "running":"Running",
                    "upcoming":"Future"
                }
            },
            start: "",
            end: "",
            interval: "",
            days:"",
            minutes:"",
            hours:"",
            seconds:"",
            message:"",
            statusType:"",
            statusText: "",

        };
    },
    created: function () {
    },
    mounted(){
        this.start = new Date(this.starttime).getTime();
        this.end = new Date(this.endtime).getTime();
        // Update the count down every 1 second
        this.timerCount(this.start,this.end);
        this.interval = setInterval(() => {
            this.timerCount(this.start,this.end);
        }, 1000);
    },
    methods: {
        timerCount: function(start,end){
            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = start - now;
            var passTime =  end - now;

            if(distance < 0 && passTime < 0){
                this.message = this.wordString.expired;
                this.statusType = "expired";
                this.statusText = this.wordString.status.expired;
                clearInterval(this.interval);
                return;

            }else if(distance < 0 && passTime > 0){
                this.calcTime(passTime);
                this.message = this.wordString.running;
                this.statusType = "running";
                this.statusText = this.wordString.status.running;

            } else if( distance > 0 && passTime > 0 ){
                this.calcTime(distance);
                this.message = this.wordString.upcoming;
                this.statusType = "upcoming";
                this.statusText = this.wordString.status.upcoming;
            }
        },
        calcTime: function(dist){
            // Time calculations for days, hours, minutes and seconds
            this.days = Math.floor(dist / (1000 * 60 * 60 * 24));
            this.hours = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            this.minutes = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
            this.seconds = Math.floor((dist % (1000 * 60)) / 1000);
        }

    }
}
</script>

<style scoped>
.timer {
    font-size: 18px;
    color: #fff;
    text-align: center;
    margin-top: 50px;
}
.day, .hour, .min, .sec {
    font-size: 18px;
    display: inline-block;
    font-weight: 500;
    text-align: center;
    margin: 3px;
    width: 30px;
}
.format {
    font-weight: 300;
    font-size: 11px;
    opacity: 0.8;
}
.number{
    background: rgba(229, 46, 4,.8);
    color: #ffffff;
    /*/padding: 3px;*/
    border-radius: 5px;
    display: inline-block;
    text-align: center;
    width: 100%;
}
.message {
    font-size: 14px;
    font-weight: 400;
    margin-top: 3px;
}
</style>
