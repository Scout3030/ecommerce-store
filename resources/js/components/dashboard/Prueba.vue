<template>
  <div class="small">
    <graphic :chartData="chartData" :options="chartOptions"></graphic>
  </div>
</template>

<script>
  	import Chart from './Chartjs/ChartJs1.vue'
  	import axios from 'axios'
  	export default {
  		mounted(){
  			this.fillData()
  		},
	    components: {
	      graphic : Chart
	    },
	    data () {
			return {
				chartData: {
					type: Object,
					default: null
				},
				chartOptions: {
					type: Object,
					default: null
				},
				counts: [],
				names: []
			}
	    },
	    methods: {
	    	fillData(){

				// const {data} = await Vue.axios({
				// 	url: '/api/best-selling'
				// })

				// this.counts = data.map(function (value, index, array) {
				//     return parseInt(value.count); 
				// });
				// this.name = data.map(function (value, index, array) {
				//     return value.product.name; 
				// });

	    		this.chartData = {
							      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
							      datasets: [
							        {
							          label: 'Data One',
							          backgroundColor: '#FC2525',
							          data: [40, 39, 10, 40, 39, 80, 40]
							        }, {
							          label: 'Data Two',
							          backgroundColor: '#05CBE1',
							          data: [60, 55, 32, 10, 2, 12, 53]
							        }
							      ]
							    }

				this.chartOptions = {responsive: true, maintainAspectRatio: false}
	    	}
	    }
	}
</script>