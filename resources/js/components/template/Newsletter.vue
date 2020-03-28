<template>
	<form 
		@submit.prevent="processEmail" 
		class="subscribe-form form-inline mt-5 pt-1" 
		novalidate>
		<div class="col-md-12">
			<p v-if="!$v.email.email" style="color: red">Ingrese un correo válido</p>
			<p v-if="messageShow">{{message}}</p>
		</div>
		<div class="form-group ml-sm-auto">
			<input 
			class="form-control mb-1" 
			type="email" 
			placeholder="Ingresa tu correo electrónico" 
			v-model.trim="$v.email.$model">
			<div class="info"></div>
		</div>
		<button 
			class="button button-subscribe mr-auto mb-1" 
			type="submit"
		>Suscribirme</button>
	</form>
</template>

<script>
	import {validationMixin} from 'vuelidate'
	import {required, minLength, email} from 'vuelidate/lib/validators'
	export default {
		data(){
			return {
				email: '',
				message: '',
				messageShow: false
			}
		},
		methods: {
			async processEmail(){
			      this.$v.$touch()
			      if (this.$v.$invalid) {

			      } else {
			        const {data} = await Vue.axios({
						method: 'POST',
						url: '/api/email-subscription',
						data: {
							email: this.email
						}
					})

					this.message = data
					this.messageShow = true

					setTimeout(() => {
			          	this.messageShow = false
			          	this.email = ''
			        }, 5000)
					
			      }
			}
		},
		validations: {
			email: {
				required,
				minLength: minLength(5),
				email
			}
		}
	}
</script>
