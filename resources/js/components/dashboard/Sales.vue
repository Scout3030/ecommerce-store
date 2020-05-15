<template>
	<div class="row">
	    <div class="col-sm-12 col-md-7 col-lg-8">
	        <div class="mb-3 card">
	            <div class="card-header-tab card-header">
	                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Ultimos 7 días</div>
	                <div class="btn-actions-pane-right text-capitalize">
	                    <button class="btn btn-warning">Acciones</button>
	                </div>
	            </div>
	            <div class="pt-0 card-body">
	                <apexchart 
	                	id="chart"
		                width="100%" 
		                height="auto" 
		                type="area" 
		                :options="chartOptions" 
		                :series="series"
	                ></apexchart>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
	import VueApexCharts from 'vue-apexcharts'
	import axios from 'axios'
	export default{
		data() {
		    return {
				series: [
					{
					  name: "Ventas",
					  data: [12, 11, 14, 18]
					},
					{
					  name: "Costos",
					  data: [24, 22, 28, 36]
					}
				],
				chartOptions: {
					chart: {
						height: 350,
						type: 'line',
						dropShadow: {
							enabled: true,
							color: '#000',
							top: 18,
							left: 7,
							blur: 10,
							opacity: 0.2
						},
						toolbar: {
							show: true
						}
					},
					colors: ['#77B6EA', '#545454'],
					dataLabels: {
					  	enabled: true,
					},
					stroke: {
					  	curve: 'smooth'
					},
					title: {
					  	text: 'Ingresos vs costos',
					  	align: 'left'
					},
					grid: {
					  	borderColor: '#e7e7e7',
					  	row: {
					    	colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
					    	opacity: 0.5
					  	},
					},
					markers: {
					  	size: 1
					},
					xaxis: {
					  	categories: ['Ene', 'Feb', 'Mar', 'Apr'],
					  	title: {
					    	text: 'Mes'
					  	}
					},
					yaxis: {
						decimalsInFloat: 2,
						max: 1500,
						min: 5,
						title: {
							text: 'Moneda'
						},
					},
					legend: {
						position: 'top',
						horizontalAlign: 'right',
						floating: true,
						offsetY: -25,
						offsetX: -5
					}
				},
				data: null,
				cost: [],
				price: [],
				date: []
		    }
	  	},
	  	components: {
		    apexchart: VueApexCharts,
		},
	  	mounted(){
	  		this.getData()
	  	},
	  	methods: {
	  		getData(){
	  			axios.get('/api/sell-cost')
					.then((response) => {
						this.data = response.data
						this.price = this.data.map(function (value, index, array) {
						    return parseFloat(value.price); 
						});
						this.cost = this.data.map(function (value, index, array) {
						    return parseFloat(value.cost); 
						});
						this.date = this.data.map(function (value, index, array) {
						    return value.date; 
						});

						var max = 1500
						this.series = [
						{
							name: 'Ventas',
							data: this.price
						},
						{
							name: 'Costos',
							data: this.cost
						}]

						this.chartOptions = {
							xaxis: {
							  	categories: this.date,
							  	title: {
							    	text: 'Fecha'
							  	}
							},
							yaxis: {
								max: 1000,
								min: 50,
							   	title: {
									text: 'Soles'
								}	
							}
						}

					});
	  		}
	  	}
	}
</script>