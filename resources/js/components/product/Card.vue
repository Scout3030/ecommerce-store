<template>
	<div class="col-md-6 col-lg-4">
		<div class="card text-center card-product">
			<div class="card-product__img">
				<img class="card-img" :src="getImage(product.picture)" alt="">
				<ul class="card-product__imgOverlay">
					<li><button><i class="ti-search"></i></button></li>
					<li><button @click="addToCart(product)"><i class="ti-shopping-cart"></i></button></li>
					<li><button><i class="ti-heart"></i></button></li>
				</ul>
			</div>
			<div class="card-body">
				<p>{{product.category.name}}</p>
				<h4 class="card-product__title"><a :href="getUrl(product.slug)">{{product.name}}</a></h4>
				<p class="card-product__price">S/{{product.price}}</p>
			</div>
		</div>
	</div>
</template>
<script>
	import {mapActions, mapMutations, mapState} from 'vuex'
	export default {
		mounted() {

        },
        props: {
        	product: {
        		type: Object,
        		required: true
        	}
        },
        methods: {
        	...mapMutations('cart', ['addProduct']),
        	getImage(attachment){
        		return `/images/products/${attachment}`
        	},
        	getUrl(slug){
        		return `/producto/${slug}`
        	},
        	addToCart(product){
        		console.log(product)
        		this.addProduct(product)
        	}
        },
        computed: {

        }
	};
</script>