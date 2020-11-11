<script>
import { Bar } from 'vue-chartjs'
export default {
    extends:Bar,
    name: "BarChart",
    props: {
        chartData: {
            type: Array,
            required: false
        },
        chartLabels: {
            type: Array,
            required: true
        }
    },
    data () {
        return {
            options: {
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    mounted () {
        this.renderChart({
            labels: this.chartLabels,
            datasets: this.chartData,
        }, this.options)
    }
}
</script>

<style scoped>

</style>
