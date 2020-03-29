<template>
	<div class="col-md-6 col-lg-4">
		<div class="card text-center card-product">
			<div class="card-product__img">
				<img class="card-img" :src="$getImageUrl('products', product.picture)" alt="">
				<ul class="card-product__imgOverlay">
					<li><button @click="redirectToProduct(product)"><i class="ti-search"></i></button></li>
					<li><button @click="addToCart(product)"><i class="ti-shopping-cart"></i></button></li>
				</ul>
			</div>
			<div class="card-body">
				<p>{{product.name}}</p>
				<h4 class="card-product__title"><a :href="$getProductUrl(product.slug)" target="_BLANK">{{product.name}}</a></h4>
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
        	addToCart(product){
        		this.addProduct(product)
        	},
        	redirectToProduct(product){
        		window.open(`/producto/${product.slug}`, '_blank');
        	}
        },
        computed: {

        }
	};
</script>