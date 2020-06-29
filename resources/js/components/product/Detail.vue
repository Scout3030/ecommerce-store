<template>
	<div class="col-lg-5 offset-lg-1">
		<div class="s_product_text">
			<h3>{{product.name}}</h3>
			<h2>S/{{product.price}}</h2>
			<ul class="list">
				<li><a class="active" href="javascript:void(0)"><span>Categoría</span> : {{product.category.name}}</a></li>
				<li><a href="javascript:void(0)"><span>Disponible</span> : {{product.stock}} unidades</a></li>
			</ul>
			<p>{{product.description}}</p>
			<div class="product_count">
  			<label for="qty">Cantidad:</label>
				<input type="number" name="qty" id="sst" v-model="qty" min="1">
				<a class="button primary-btn" href="javascript:void(0)" @click="addToCart(product, qty)">Añadir al carrito</a>
			</div>
			<a href="/tienda" class="button primary-btn">Seguir comprando</a>
			<a href="/carrito" class="button primary-btn">Finalizar pedido</a>
		</div>
		<loader :show="show" @close="show = false"></loader>
	</div>
</template>

<script>
	import {mapMutations} from 'vuex'
	import Loader from './../cart/Loader'
	export default{
		data(){
			return {
				qty: 1,
				show: false
			}
		},
		components: {
        	Loader
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
				this.show = true
			}
		}
	}
</script>