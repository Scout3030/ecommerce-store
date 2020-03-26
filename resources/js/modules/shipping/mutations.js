export function setShippingMethods(state, shipping){
	state.shippingMethods = shipping
}

export function setShipping(state, shipping){
	state.selectedShippingMethod = shipping
}

export function shippingsError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.shippingMethods = []
}
