<template>
	<div class="sidebar-categories">
		<div class="head">Categorias</div>
		<ul class="main-categories">
			<li class="common-filter">
				<form action="#">
					<ul>
						<li class="filter-list">
							<input class="pixel-radio" type="radio" name="category_id" @click="getCategory(null)" checked>
							<label>Todas las categorías
							</label>
						</li>
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
        	...mapMutations('filter', ['setCategory', 'setUrl']),
		    getCategory(id){
		        this.setCategory(id)
		        this.setUrl([this.selectedCategory, this.selectedWord])
		    }
        },
        computed: {
        	...mapState('category', ['categories']),
        	...mapState('product', ['products']),
        	...mapState('filter', ['selectedCategory', 'selectedWord']),
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
