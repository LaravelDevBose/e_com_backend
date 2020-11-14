<script>
import {Pie} from 'vue-chartjs';
export default {
    extends: Pie,
    name: "DonutChart",
    props: {
        chartData: {
            type: Array,
            required: false
        },
        chartLabels: {
            type: Array,
            required: true
        },
        chartColors: {
            type: Array,
            required: false
        }
    },
    data () {
        return {
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    mounted () {
        this.renderChart({
            labels: this.chartLabels,
            datasets: [
                {
                    data: this.chartData
                }
            ],
        }, this.options)
    }
}
</script>

<style scoped>

</style>
