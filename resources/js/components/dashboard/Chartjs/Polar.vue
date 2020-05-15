<script>
  import {PolarArea, mixins} from 'vue-chartjs'
  const { reactiveProp } = mixins

  export default {
    extends: PolarArea,
    mixins: [reactiveProp],
    props: ['options'],
    mounted () {
      this.renderChart(this.chartdata, this.options)
    }
  }
</script>