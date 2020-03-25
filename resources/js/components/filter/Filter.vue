<template>
	<div class="row">

		<product-component v-for="product in products" :product="product" :key="product.id"></product-component>

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
	      	this.searchProducts(['all', 'all', 'all'])
	    },
	    data() {
	      	return {
	        	// newProducts: [],
				// searching: false,
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
			...mapActions('product', ['searchProducts']),
			// search: function(){
			// 	this.newProducts = [];
			// 	this.searching = true;
			// 	this.resource_url = 'https://store.dev/api/product/search'+this.selectedQuery+'/'+this.selectedCategory+'/'+this.selectedColor;

			// 	axios.get(this.resource_url)
			// 		.then((response) => {
			// 			if (response.body.error) {
			// 				console.log('Ha ocurrido un error')
			// 			}else{
			// 				Vue.set([], 'newProducts', response.body)
			// 			}
			// 		});

			// 		this.searching = false;

			// },
			// updateResource: function(data){
			// 	this.newProducts = data;
			// }
		},
	    computed: {
	      	...mapState('product', ['products']),
	      	...mapState('filter', ['selectedCategory', 'selectedColor', 'selectedQuery']),
	    }
	}
	
</script>