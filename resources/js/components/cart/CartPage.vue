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

					<card v-for="product in cart" :product="product" :key="product.id">
					</card>
					
					<tr class="bottom_button">
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td>
							<div class="cupon_text d-flex align-items-center">
								<input type="text" placeholder="Código de cupón" v-model="coupon">
								<a class="primary-btn" href="javascript:void(0)" @click="applyCoupon">Aplicar</a>
								<a class="button" href="javascript:void(0)" v-if="selectedCoupon.value == 0">¿Tienes un cupón?</a>
								<a class="button" href="javascript:void(0)" v-else>Aplicaste el cupon <strong><i>{{selectedCoupon.name}}</i></strong></a>
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
							<h5>S/{{totalCost - selectedCoupon.value}}</h5>
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
								<ul class="list" v-if="totalCost < 150">
									<li 
										class="active"
										v-for="shipping in shippingMethods" 
										:key="shipping.id" 
										@click="selectShippingMethod(shipping)"
									>
										<a href="javascript:void(0)">{{shipping.name}}</a>
									</li>
								</ul>
								<ul class="list" v-else>
									<li 
										class="active"
									>
										<a href="javascript:void(0)">Gratis</a>
									</li>
								</ul>
								<h6>
									Calcular envío 
									<i class="fa fa-caret-down" aria-hidden="true"></i>
								</h6>
								<select class="shipping_select" v-if="lima">
									<option value="1">Lince</option>
									<option value="2">Pueblo libre</option>
									<option value="4">Magdalena del Mar</option>
								</select>
								<select class="shipping_select" v-if="agency || olva">
									<option value="1">La libertad</option>
									<option value="2">Cajamarca</option>
									<option value="4">Piura</option>
								</select>
								<label>Precio</label>
								<input type="text" readonly>
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
								<a class="gray_btn" href="/tienda">Seguir comprando</a>
								<a class="primary-btn ml-2" href="/checkout">Proceder a Pagar</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	import Card from './Card'
	import {mapState, mapGetters, mapMutations, mapActions} from 'vuex'
	export default {
		mounted(){
			this.fetchShippingMethods()
		},
		data(){
			return {
				free: false,
				store: false,
				lima: false,
				olva: false,
				agency: false,
				coupon: null
			}
		},
		components: {
			Card
		},
		methods: {
			...mapActions('shipping', ['fetchShippingMethods']),
			...mapActions('coupon', ['fetchCoupon']),
			...mapMutations('shipping', ['setShipping']),
			selectShippingMethod(shipping){
				this.setShipping(shipping)
				if (this.selectedShippingMethod.id == 1) {
					this.free = true
					this.store = false
					this.lima = false
					this.olva = false
					this.agency = false
				}

				if (this.selectedShippingMethod.id == 2) {
					this.free = false
					this.store = true
					this.lima = false
					this.olva = false
					this.agency = false
				}

				if (this.selectedShippingMethod.id == 3) {
					this.free = false
					this.store = false
					this.lima = true
					this.olva = false
					this.agency = false
				}
				
				if (this.selectedShippingMethod.id == 4) {
					this.free = false
					this.store = false
					this.lima = false
					this.olva = true
					this.agency = false
				}

				if (this.selectedShippingMethod.id == 5) {
					this.free = false
					this.store = false
					this.lima = false
					this.olva = false
					this.agency = true
				}
			},
			async applyCoupon(){
				this.fetchCoupon(this.coupon)
			}
		},
		computed: {
			...mapState('coupon', ['selectedCoupon']),
			...mapGetters('cart', ['totalCost']),
			...mapState('cart', ['cart']),
			...mapState('shipping', ['shippingMethods', 'selectedShippingMethod'])
		}
	}
</script>