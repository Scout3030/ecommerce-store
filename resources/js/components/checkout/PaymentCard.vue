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
                <form action="/sells" method="POST">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="cart" :value="convertCart()">
                    <input type="hidden" name="shipping_id" :value="1">
                    <input type="hidden" name="payment_method_id" :value="paymentMethod.id">
                    <button type="submit" class="button button-paypal">Pagar con {{payment}}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	import {mapState, mapGetters, mapActions, mapMutations} from 'vuex'
	export default {
		data(){
			return {
				payment: null,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			}
		},
        mounted(){
            this.fetchPaymentMethods()
            this.convertCart()
        },
        methods:{
            ...mapActions('paymentmethod', ['fetchPaymentMethods']),
            ...mapMutations('paymentmethod', ['setPaymentMethod']),
            selectPaymentMethod(paymentMethod){
                this.setPaymentMethod(paymentMethod)
            },
            sendData(){
                console.log('Send data')
            },
            convertCart(){
                var map = this.cart.map(function(obj){
                    return [obj.id, obj.qty]
                })
                return map
            }
        },
		computed:{
			...mapState('cart', ['cart']),
			...mapGetters('cart', ['totalCost']),
            ...mapState('paymentmethod', ['paymentMethod', 'paymentMethods']),
            ...mapState('shipping', ['selectedSHippingMethod', 'shippingCost'])
		}
	}
</script>