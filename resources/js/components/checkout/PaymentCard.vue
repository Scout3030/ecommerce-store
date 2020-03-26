<template>
	<div class="col-lg-4">
        <div class="order_box">
            <h2>Tu pedido</h2>
            <ul class="list">
                <li><a href="javascript:void(0)"><h4>Product <span>Total</span></h4></a></li>
                <li v-for="product in cart"><a href="javascript:void(0)">{{product.name}}<span class="middle">x {{product.qty}}</span> <span class="last">S/{{product.price * product.qty}}</span></a></li>
            </ul>
            <ul class="list list_2">
                <li><a href="javascript:void(0)">Subtotal <span>S/{{totalCost}}</span></a></li>
                <li><a href="javascript:void(0)">Envío <span>S/{{shippingCost}}</span></a></li>
                <li><a href="javascript:void(0)">Total <span>S/{{totalCost + shippingCost}}</span></a></li>
            </ul>
            <div class="payment_item" v-for="method in paymentMethods" >
                <div class="radion_btn">
                    <input type="radio" :id="method.id" v-model="payment" :value="method.name" @click="selectPaymentMethod(method)">
                    <label :for="method.id">{{method.name}}</label>
                    <img :src="$getImageUrl('payments', method.picture)" alt="">
                    <div class="check"></div>
                </div>
                <p v-if="method.id == 1">Please send a check to Store Name, Store Street, Store Town, Store State / County,
                    Store Postcode.</p>
                <!-- <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                    Store Postcode.</p> -->
            </div>
            
            <div class="text-center">
              <a class="button button-paypal" href="javascript:void(0)">Pagar con {{payment}}</a>
            </div>
        </div>
    </div>
</template>

<script>
	import {mapState, mapGetters, mapActions, mapMutations} from 'vuex'
	export default {
		data(){
			return {
				payment: null
			}
		},
        mounted(){
            this.fetchPaymentMethods()
        },
        methods:{
            ...mapActions('paymentmethod', ['fetchPaymentMethods']),
            ...mapMutations('paymentmethod', ['setPaymentmethod']),
            selectPaymentmethod(paymentMethod){
                this.setPaymentmethod(paymentMethod)
            }
        },
		computed:{
			...mapState('cart', ['cart']),
			...mapGetters('cart', ['totalCost']),
            ...mapState('paymentmethod', ['paymentMethods']),
            ...mapState('shipping', ['shippingCost'])
		}
	}
</script>