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
									>
										<a href="javascript:void(0)">Huamachuco: S/5</a>
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
									Precio total
									<i class="fa fa-caret-down" aria-hidden="true"></i>
								</h6>
								<input v-if="totalCost < 150" type="text" :placeholder="totalCostShipping" readonly>
								<input v-else type="text" :placeholder="totalCostFreeShipping" readonly>
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
				coupon:null
			}
		},
		components: {
			Card
		},
		methods: {
			...mapActions('shipping', ['fetchShippingMethods']),
			...mapActions('coupon', ['fetchCoupon']),
			async applyCoupon(){
				this.fetchCoupon(this.coupon)
			}
		},
		computed: {
			...mapState('coupon', ['selectedCoupon']),
			...mapGetters('cart', ['totalCost']),
			...mapState('cart', ['cart']),
			...mapState('shipping', ['shippingCost']),
			totalCostFreeShipping(){
				return `S/ ${this.totalCost}`
			},
			totalCostShipping(){
				return `S/ ${this.totalCost + this.shippingCost}`
			}
		}
	}
</script>