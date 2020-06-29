<template>
	<div class="billing_details">
        <div class="row">
            <div class="col-lg-8">
                <h3>Detalles del envío</h3>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" placeholder="Nombre de la persona que recibe" autocomplete="off" v-model="clientName">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" v-model="clientPhone" placeholder="Teléfono" autocomplete="off">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" v-model="clientAddress" placeholder="Dirección" autocomplete="off">
                    </div>
                    <div class="col-md-12 form-group">
                        <textarea class="form-control" v-model="clientMessage" rows="1" placeholder="Referencia (Incluya información adicional que crea conveniente)"></textarea>
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
                clientName:null,
                clientPhone: null,
                clientAddress: null,
                clientMessage: null
			}
		},
		components: {
			PaymentCard
		},
		computed:{
			...mapState('shipping', ['selectedShippingMethod'])
		}
	}
</script>