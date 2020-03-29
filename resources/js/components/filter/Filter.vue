<template>

	<div class="col-xl-9 col-lg-8 col-md-7">
      <!-- Start Filter Bar -->
		<div class="filter-bar d-flex flex-wrap align-items-center">
			<div class="ml-auto">
				<div class="input-group filter-bar-search">
					<input type="text" 
					placeholder="¿Qué estas buscando?"
					v-model="word">
					<div class="input-group-append">
						<button type="button"
						@click="searchProducts(word)"
						v-if="!searching"><i class="ti-search"></i></button>
					</div>
				</div>
			</div>
		</div>
      <!-- End Filter Bar -->
      <!-- Start Best Seller -->
		<section class="lattest-product-area pb-40 category-list">

			<div class="row" v-if="products.length">
				<product-component v-for="product in products" :product="product" :key="product.id"></product-component>
				<div class="pull-right">
					<v-paginator
						v-if="products"
						:options="options"
						:resource_url="selectedUrl"
						v-on:update="updateResource"
					></v-paginator>
				</div>

			</div>
			<div v-else>
				<div><p><b>No hay productos en esta búsqueda, intente con una palabra clave diferente</b></p></div>
			</div>

		</section>
      <!-- End Best Seller -->
    </div>
	

</template>

<script>
	import Vue from 'vue'
	import axios from 'axios'
	import VuePaginator from 'vuejs-paginator'
	import ProductComponent from './../product/Card'
	import {mapMutations, mapActions, mapState} from 'vuex'
	export default {
	    data() {
	      	return {
	      		word: '',
	        	products: [],
				searching: false,
				options: {
					remote_current_page: 'current_page',
					remote_last_page: 'last_page',
					remote_next_page_url: 'next_page_url',
					remote_prev_page_url: 'prev_page_url',
					next_button_text: 'Siguiente',
					previous_button_text: 'Anterior'
				}
	      	}
	    },
	    mounted(){
	    	this.search()
	    },
	    components: {
			ProductComponent,
			VPaginator: VuePaginator,
		},
		methods: {
			...mapActions('product', ['searchProducts']),
			...mapMutations('filter', ['setUrl', 'setWord']),
			...mapMutations('product', ['setProducts']),
			search: function (){
				this.products = [];
				this.searching = true;

				axios.get(this.selectedUrl)
					.then((response) => {
						this.products = response.data.data
					});

				this.searching = false;
			},
			updateResource: function(data){
				this.products = data;
			},
			searchProducts(word){
				console.log('searching', word)
				this.setWord(word)
        		this.setUrl([this.selectedCategory, this.selectedColor, this.selectedWord])
        		this.search()
			}
		},
	    computed: {
	      	...mapState('filter', ['selectedCategory', 'selectedColor', 'selectedWord', 'selectedUrl']),
	    },
	}
	
</script>