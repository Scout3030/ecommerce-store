<template>
	<div class="billing_details">
        <div class="row">
            <div class="col-lg-8">
                <h3>Detalles de facturación (solo emisión de boletas)</h3>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="first" name="name" placeholder="Nombre / Empresa">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="last" name="name" placeholder="DNI / RUC">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="company" name="company" placeholder="Dirección">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Referencia">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="email" name="compemailany" placeholder="Teléfono">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="email" name="compemailany" placeholder="Correo electrónico">
                    </div>
                    <div class="col-md-12 form-group mb-0">
                        <div class="creat_account">
                        	<h3>Detalles del envío</h3>
                            <label>El pedido será enviado vía <strong>{{selectedShippingMethod.name}}</strong></label>
                            <br>
                            <input 
	                            type="checkbox" 
	                            v-model="checkbox"
	  						>
                            <label for="f-option3">¿Enviar a una dirección diferente a la de facturación?</label>
                        </div>
                        <input type="text" class="form-control" v-if="checkbox" placeholder="Escriba la nueva dirección">
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Incluya información adicional que crea conveniente (opcional)"></textarea>
                    </div>
                </form>
            </div>
            <payment-card></payment-card>
        </div>
    </div>
</template>
<script>
	import PaymentCard from './PaymentCard'
	import {mapState} from 'vuex'
	export default {
		data(){
			return {
				checkbox: false
			}
		},
		components: {
			PaymentCard
		},
		computed:{
			...mapState('shipping', ['selectedShippingMethod'])
		},
		methods:{
		}
	}
</script>