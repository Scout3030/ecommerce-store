<template>
	<div class="sidebar-categories">
		<div class="head">Categorias</div>
		<ul class="main-categories">
			<li class="common-filter">
				<form action="#">
					<ul>
						<li class="filter-list" v-for="category in categories">
							<input class="pixel-radio" type="radio" :value="category.id" name="category_id" @click="getCategory(category.id)">
							<label>{{category.name | capitalize}}
								<span> ({{category.products_count}})</span>
							</label>
						</li>
					</ul>
				</form>
			</li>
		</ul>
	</div>
</template>
<script>
	import {mapActions, mapMutations, mapState} from 'vuex'
	export default {
		mounted() {
            this.fetchCategories()
        },
        data() {
        	return {
        		category: '',
        		selected: false
        	}
        },
        methods: {
        	...mapActions('category', ['fetchCategories']),
        	...mapActions('product', ['searchProducts']),
        	...mapMutations('filter', ['setCategory']),
		      getCategory(id){
		        this.setCategory(id)
        		this.searchProducts( [this.selectedQuery, this.selectedCategory, this.selectedColor])
		      }
        },
        computed: {
        	...mapState('category', ['categories']),
        	...mapState('product', ['products']),
        	...mapState('filter', ['selectedCategory', 'selectedColor', 'selectedQuery']),
        },
		filters: {
			capitalize: function (value) {
			    if (!value) return ''
			    value = value.toString()
			    return value.charAt(0).toUpperCase() + value.slice(1)
			}
		}
	};
</script>
