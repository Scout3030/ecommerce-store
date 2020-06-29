<template>
	<div class="col-lg-4">
        <div class="order_box">
            <h2>Tu pedido</h2>
            <ul class="list">
                <li><a href="javascript:void(0)"><h4>Producto <span>Total</span></h4></a></li>
                <li v-for="product in cart"><a href="javascript:void(0)">{{product.name}}<span class="middle">x {{product.qty}}</span> <span class="last">S/{{product.price * product.qty}}</span></a></li>
            </ul>
            <ul class="list list_2">
                <li><a href="javascript:void(0)">Subtotal <span>S/{{totalCost}}</span></a></li>
                <li v-if="totalCost >= 150">
                    <a href="javascript:void(0)">Envío <span>Gratis</span></a>
                </li>
                <li v-else>
                    <a href="javascript:void(0)">Envío <span>S/{{shippingCost}}</span></a>
                </li>
                <li v-if="totalCost >= 150">
                    <a href="javascript:void(0)">Total <span>S/{{totalCost}}</span></a>
                </li>
                <li v-else>
                    <a href="javascript:void(0)">Total <span>S/{{totalCost + shippingCost}}</span></a>
                </li>
            </ul>
            <div class="payment_item" >
                <p>Por motivos de higiene y salud solo aceptamos pagos por depósitos en cuenta, pagos con tarjeta de débito o crédito y billeteras digitales.</p>
            </div>

            <div class="payment_item" v-for="method in paymentMethods" >
                <div class="radion_btn">
                    <input type="radio" :id="method.id" v-model="payment" :value="method.name" @click="selectPaymentMethod(method)">
                    <label :for="method.id">{{method.name}}</label>
                    <img :src="$getImageUrl('payments', method.picture)" alt="">
                    <div class="check"></div>
                </div>
            </div>
            
            <div class="text-center">
                <form action="/sells" method="POST" @submit.prevent="sendData" ref="form">
                    <input type="hidden" name="_token" :value="csrf">
                    <!--shipping-->
                    <input type="hidden" name="client_name" :value="$parent.clientName">
                    <input type="hidden" name="client_phone" :value="$parent.clientPhone">
                    <input type="hidden" name="client_address" :value="$parent.clientAddress">
                    <input type="hidden" name="client_message" :value="$parent.clientMessage">
                    <!--shipping-->
                    
                    <input type="hidden" name="cart" :value="convertCart()">
                    <!--<input type="hidden" name="shipping_id" :value="shipping">-->
                    <input type="hidden" name="payment_method_id" :value="paymentMethod.id">
                    <button type="submit" class="button button-paypal">Pagar con {{payment}}</button>
                    <div class="error" v-if="$v.payment.$error &&!$v.payment.required">Seleccione un método de pago</div>
                    <div class="error" v-if="!clientData">Por favor ingrese los datos de la entrega</div>
                </form>
            </div>
            
        </div>
    </div>
</template>

<script>
    import { required } from 'vuelidate/lib/validators'
	import {mapState, mapGetters, mapActions, mapMutations} from 'vuex'
	export default {
		data(){
			return {
				payment: null,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                clientData: true
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
                console.log(this.$parent.clientName)
                this.$v.$touch()
                if (this.$v.$invalid) {
                    this.submitStatus = 'ERROR'
                } else {
                    if (this.$parent.clientName != null && this.$parent.clientPhone != null && this.$parent.clientAddress != null) {
                        this.clientData = true
                        this.$refs.form.submit()
                    }else{
                        this.clientData = false
                    }
                }
                
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
		},
        validations: {
            payment: {
              required,
            }
        }
	}
</script>