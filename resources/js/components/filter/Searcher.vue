<template>
	<div class="filter-bar d-flex flex-wrap align-items-center">
		<!-- <div class="sorting">
			<select>
				<option value="1">Default sorting</option>
				<option value="1">Default sorting</option>
				<option value="1">Default sorting</option>
			</select>
		</div>
		<div class="sorting mr-auto">
			<select>
				<option value="1">Show 12</option>
				<option value="1">Show 12</option>
				<option value="1">Show 12</option>
			</select>
		</div> -->
		<div class="ml-auto">
			<div class="input-group filter-bar-search">
				<input type="text" placeholder="¿Qué estas buscando?"
				v-model="query">
				<div class="input-group-append">
					<button type="button"
					@click="search(query)"
					v-if="!searching"><i class="ti-search"></i></button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import {mapMutations, mapActions, mapState} from 'vuex'
	export default {
		data() {
	      	return {
				searching: false,
				query: '',
	      	}
	    },
	    methods: {
	    	...mapActions('product', ['searchProducts']),
	    	...mapMutations('filter', ['setQuery']),
	    	search(query){
	    		console.log(query)
	    		this.setQuery(query)
	    		this.searchProducts( [this.selectedQuery, this.selectedCategory, this.selectedColor])
	    	},
	    	updateResource: function(data){
				this.products = data;
			}
	    },
	    computed: {
	      	...mapState('product', ['products']),
	      	...mapState('filter', ['selectedCategory', 'selectedColor', 'selectedQuery']),
	    }
	}
</script>