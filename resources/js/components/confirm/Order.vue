<template>
	<div class="order_details_table">
        <h2>Detalles del pedido</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in cart">
                        <td>
                            <p>{{product.name}}</p>
                        </td>
                        <td>
                            <h5>x {{product.qty}}</h5>
                        </td>
                        <td>
                            <p>S/{{product.qty * product.price}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Subtotal</h4>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td>
                            <p>S/ {{totalCost}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Entrega</h4>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td v-if="totalCost < 150">
                            <p>S/5.00 (varia dependiendo de la distancia y el peso)</p>
                        </td>
                        <td v-else>
                            <p>Gratis</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Total</h4>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td v-if="totalCost < 150">
                            <h4>S/{{totalCost + shippingCost}}</h4>
                        </td>
                        <td v-else>
                            <h4>S/{{totalCost}}</h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
	import {mapState, mapGetters} from 'vuex'
	export default {
		computed: {
			...mapState('cart', ['cart']),
			...mapState('shipping', ['shippingCost']),
			...mapGetters('cart', ['totalCost'])
		},
	}
</script>