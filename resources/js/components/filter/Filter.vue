<template>
	<div class="row">

		<product-component v-for="product in products" :product="product"></product-component>
		<!-- <div class="pull-right">
			<v-paginator
				v-if="products"
				:options="options"
				:resource_url="resource_url"
				v-on:update="updateResource"
			></v-paginator>
		</div> -->

    </div>
</template>

<script>
	import Vue from 'vue'
	import VuePaginator from 'vuejs-paginator'
	import ProductComponent from './../product/Card'
	import {mapMutations, mapActions, mapState} from 'vuex'
	export default {
		mounted() {
	      	this.fetchProducts()
	    },
	    data() {
	      	return {
	   //      	products: [],
				// searching: false,
				// query: '',
				// resource_url: '',
				// options: {
				// 	remote_current_page: 'current_page',
				// 	remote_last_page: 'last_page',
				// 	remote_next_page_url: 'next_page_url',
				// 	remote_prev_page_url: 'prev_page_url',
				// 	next_button_text: 'Siguiente',
				// 	previous_button_text: 'Anterior'
				// },
	      	}
	    },
	    components: {
			ProductComponent,
			VPaginator: VuePaginator,
		},
	    props: {
	      // color: {
	      //  type: Object,
	      //  required: true
	      // }
	    },
		methods: {
			...mapActions('product', ['fetchProducts']),
			// search: function(){
			// 	this.products = [];
			// 	this.searching = true;
			// 	this.resource_url = 'https://store.dev/api/product'+ this.query+'/search';

			// 	axios.get(this.resource_url)
			// 		.then((response) => {
			// 			if (response.body.error) {
			// 				console.log('Ha ocurrido un error')
			// 			}else{
			// 				Vue.set([], 'products', response.body)
			// 			}
			// 		});

			// 		this.searching = false;
			// 		this.query = '';
			// },
			updateResource: function(data){
				this.products = data;
			}
		},
	    computed: {
	      	...mapState('product', ['products']),
	    }
	}
	
</script>