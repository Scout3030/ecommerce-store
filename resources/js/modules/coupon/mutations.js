export function setCoupon(state, coupon){
	state.selectedCoupon = coupon
}

export function colorsError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.colors = []
}
