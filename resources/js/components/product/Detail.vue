<template>
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" :src="$getImageUrl('products', product.picture)" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" :src="$getImageUrl('products', product.picture)" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" :src="$getImageUrl('products', product.picture)" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{product.name}}</h3>
						<h2>S/{{product.price}}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Categoría</span> : {{product.category.name}}</a></li>
							<li><a href="#"><span>Disponibilidad</span> : In Stock</a></li>
						</ul>
						<p>{{product.description}}</p>
						<div class="product_count">
	          			<label for="qty">Cantidad:</label>
							<input type="number" name="qty" id="sst" v-model="qty" min="1">
							<a class="button primary-btn" href="javascript:void(0)" @click="addToCart(product, qty)">Añadir al carrito</a>
						</div>
						<div class="card_area d-flex align-items-center">
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import {mapMutations} from 'vuex'
	export default{
		data(){
			return {
				qty: 1
			}
		},
		props: {
			product: {
				type: Object,
				required: true
			}
		},
		methods : {
			...mapMutations('cart', ['addProduct', 'updateQty']),
			addToCart(product, qty){
				this.updateQty({product, qty})
			}
		}
	}
</script>