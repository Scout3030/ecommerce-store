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
								<input type="text" placeholder="Código de cupón">
								<a class="primary-btn" href="#">Aplicar</a>
								<a class="button" href="#">¿Tienes un cupón?</a>
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
									<li><a href="javascript:void(0)">Envío gratis</a></li>
									<li><a href="javascript:void(0)">Recojo en tienda</a></li>
									<li class="active" v-if="lima" @click="lima = true; olva = false"><a href="javascript:void(0)">Lima Metropolitana</a></li>
									<li v-else @click="lima = true; olva = false"><a href="javascript:void(0)">Lima Metropolitana</a></li>
									<li class="active" v-if="olva" @click="olva=true; lima = false"><a href="javascript:void(0)">Olva Courier: S/15.00</a></li>
									<li v-else @click="olva=true; lima = false"><a href="javascript:void(0)">Olva Courier: S/15.00</a></li>
									<li><a href="javascript:void(0)">Agencia de transporte: S/15.00</a></li>
								</ul>
								<h6>Calcular envío <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
								<select class="shipping_select" v-if="lima">
									<option value="1">Lince</option>
									<option value="2">Pueblo libre</option>
									<option value="4">Magdalena del Mar</option>
								</select>
								<select class="shipping_select" v-if="olva">
									<option value="1">La libertad</option>
									<option value="2">Cajamarca</option>
									<option value="4">Piura</option>
								</select>
								<input type="text" placeholder="Postcode/Zipcode">
								<a class="gray_btn" href="javascript:void(0)">Actualizar</a>
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
								<a class="gray_btn" href="javascript:void(0)">Seguir comprando</a>
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
	import {mapState, mapGetters, mapMutations} from 'vuex'
	export default {
		data(){
			return {
				lima: false,
				olva: false,
				selected: true
			}
		},
		components: {
			Card
		},
		computed: {
			...mapGetters('cart', ['totalCost']),
			...mapState('cart', ['cart'])
		}
	}
</script>