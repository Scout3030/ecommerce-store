<template>
	<div class="col-md-6 col-lg-4">
		<div class="card text-center card-product">
			<div class="card-product__img">
				<img class="card-img" src="https://store.dev/assets/img/product/product1.png" alt="">
				<ul class="card-product__imgOverlay">
					<li><button><i class="ti-search"></i></button></li>
					<li><button><i class="ti-shopping-cart"></i></button></li>
					<li><button><i class="ti-heart"></i></button></li>
				</ul>
			</div>
			<div class="card-body">
				<p>{{product.category.name}}</p>
				<h4 class="card-product__title"><a href="#">{{product.name}}</a></h4>
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

        },
        computed: {

        }
	};
</script>