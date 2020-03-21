export function setProducts(state, products){
	state.products = products
}

export function setProduct(state, product){
	state.selectedProduct = product
}

export function productsError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.products = []
}