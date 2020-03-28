<template>

	<tr>
		<td>
			<div class="media">
				<div class="d-flex">
					<img :src="$getImageUrl('products', product.picture)" alt="" height="150px">
				</div>
				<div class="media-body">
					<p>{{product.name}}</p>
				</div>
			</div>
		</td>
		<td>
			<h5>S/{{product.price}}</h5>
		</td>
		<td>
			<div class="product_count">
				<input type="number" name="qty" id="sst" maxlength="12" v-model="qty = product.qty"
				min="1" @change="updateQuantity(product, qty)">
			</div>
		</td>
		<td>
			<h5>S/{{product.qty * product.price}}</h5>
		</td>
		<td>
			<button class="btn" title="Eliminar" @click="removeProduct(product)"><i class="fa fa-trash"></i></button>
		</td>
	</tr>

</template>

<script>
	import {mapMutations} from 'vuex'
	export default {
		data(){
			return {
				qty: null
			}
		},
		props: {
			product: {
				type: Object,
				require: true
			}
		},
		methods: {
			...mapMutations('cart', ['addProduct', 'removeProductFromCart', 'updateQty']),
			removeProduct(product){
				this.removeProductFromCart(product)
			},
			updateQuantity(product, qty){
				this.updateQty({product, qty})
			}
		}
	}
</script>