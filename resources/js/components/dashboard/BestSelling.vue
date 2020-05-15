<template>
  <div class="small">
    <graphic :chartData="chartData" :options="chartOptions"></graphic>
  </div>
</template>

<script>
  	import Doughnut from './Chartjs/Doughnut.vue'
  	import axios from 'axios'
  	export default {
  		mounted(){
  			this.fillData()
  		},
	    components: {
	      graphic : Doughnut
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
	    	async fillData(){

				const {data} = await Vue.axios({
					url: '/api/best-selling'
				})

				this.counts = data.map(function (value, index, array) {
				    return parseInt(value.count); 
				});
				this.name = data.map(function (value, index, array) {
				    return value.product.name; 
				});

	    		this.chartData = {
								    labels: this.name,
							      	datasets: [{
								        data: this.counts,
								        backgroundColor: [
								          '#8dace7',
								          '#71deb9',
								          '#ef869e'
								        ],
								        hoverBackgroundColor: [
								          '#7097e1',
								          '#4dd6a7',
								          '#eb6886'
								        ]
							      	}]
							    }

				this.chartOptions = {
										responsive: true, 
										maintainAspectRatio: false
									}
	    	}
	    }
	}
</script>