<template>
	<div class="cart_inner">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Producto</th>
						<th scope="col">Precio</th>
						<th scope="col">Cantidad</th>
						<th scope="col">Total</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="product in cart">
						<td>
							<div class="media">
								<div class="d-flex">
									<img :src="getImage(product.picture)" alt="" height="150px">
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
								<input type="number" name="qty" id="sst" maxlength="12" 
								value="1" min="1" @change="updateQuantity(product, product.qty)">
							</div>
						</td>
						<td>
							<h5>S/{{product.qty * product.price}}</h5>
						</td>
						<td>
							<button class="btn" title="Eliminar" @click="removeProduct(product)"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					
					<tr class="bottom_button">
						<td>
							<a class="button" href="#">Update Cart</a>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td>
							<div class="cupon_text d-flex align-items-center">
								<input type="text" placeholder="Coupon Code">
								<a class="primary-btn" href="#">Apply</a>
								<a class="button" href="#">Have a Coupon?</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
						</td>
						<td>
							<h5>Subtotal</h5>
						</td>
						<td>
							<h5>S/{{totalCost}}</h5>
						</td>
					</tr>
					<tr class="shipping_area">
						<td class="d-none d-md-block">
						</td>
						<td>
						</td>
						<td>
							<h5>Envío</h5>
						</td>
						<td>
							<div class="shipping_box">
								<ul class="list">
									<li><a href="#">Lima (local): S/15.00</a></li>
									<li><a href="#">Dejar en agencia: S/15.00</a></li>
									<li><a href="#">Envío gratis</a></li>
									<li class="active"><a href="#">Recojo en tienda
									</a></li>
								</ul>
								<h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
								<select class="shipping_select">
									<option value="1">Bangladesh</option>
									<option value="2">India</option>
									<option value="4">Pakistan</option>
								</select>
								<select class="shipping_select">
									<option value="1">Select a State</option>
									<option value="2">Select a State</option>
									<option value="4">Select a State</option>
								</select>
								<input type="text" placeholder="Postcode/Zipcode">
								<a class="gray_btn" href="#">Update Details</a>
							</div>
						</td>
					</tr>
					<tr class="out_button_area">
						<td class="d-none-l">
						</td>
						<td class="">
						</td>
						<td>
						</td>
						<td>
							<div class="checkout_btn_inner d-flex align-items-center">
								<a class="gray_btn" href="#">Continue Shopping</a>
								<a class="primary-btn ml-2" href="#">Proceed to checkout</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	import {mapState, mapGetters, mapMutations} from 'vuex'
	export default {
		data(){
			return {
			}
		},
		methods: {
			...mapMutations('cart', ['addProduct', 'removeProductFromCart', 'updateQty']),
			getImage(attachment){
				return `/images/products/${attachment}`
			},
			removeProduct(product){
				this.removeProductFromCart(product)
			},
			updateQuantity(product, qty){
				console.log("product", product);
				console.log("qty", qty);
				this.updateQty({product, qty})
			}
		},
		computed: {
			...mapGetters('cart', ['totalCost']),
			...mapState('cart', ['cart'])
		}
	}
</script>