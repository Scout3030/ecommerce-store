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
                <li><a href="javascript:void(0)">Envío <span>S/15.00</span></a></li>
                <li><a href="javascript:void(0)">Total <span>S/100.00</span></a></li>
            </ul>
            <div class="payment_item">
                <div class="radion_btn">
                    <input type="radio" id="f-option4" name="selector" v-model="payment" value="deposito">
                    <label for="f-option4">Depósito en cuenta</label>
                    <div class="check"></div>
                </div>
                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                    Store Postcode.{{payment}}</p>
            </div>
            <div class="payment_item">
                <div class="radion_btn">
                    <input type="radio" id="f-option5" name="selector" v-model="payment" value="mercadopago">
                    <label for="f-option5">MercadoPago</label>
                    <img src="/assets/img/payment/mercadopago.jpg" alt="">
                    <div class="check"></div>
                </div>
                <!-- <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                    Store Postcode.</p> -->
            </div>
            <div class="payment_item active">
                <div class="radion_btn">
                    <input type="radio" id="f-option6" name="selector">
                    <label for="f-option6">PayU </label>
                    <img src="/assets/img/product/card.jpg" alt="">
                    <div class="check"></div>
                </div>
                <!-- <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                    account.</p> -->
            </div>
            <div class="payment_item active">
                <div class="radion_btn">
                    <input type="radio" id="f-option7" name="selector">
                    <label for="f-option7">Paypal </label>
                    <img src="/assets/img/product/card.jpg" alt="">
                    <div class="check"></div>
                </div>
                <!-- <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                    account.</p> -->
            </div>
            <!-- <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector">
                <label for="f-option4">I’ve read and accept the </label>
                <a href="javascript:void(0)">terms & conditions*</a>
            </div> -->
            <div class="text-center">
              <a class="button button-paypal" href="javascript:void(0)">Proceed to Paypal</a>
            </div>
        </div>
    </div>
</template>

<script>
	import {mapState, mapGetters} from 'vuex'
	export default {
		data(){
			return {
				payment: null
			}
		},
		computed:{
			...mapState('cart', ['cart']),
			...mapGetters('cart', ['totalCost'])
		}
	}
</script>