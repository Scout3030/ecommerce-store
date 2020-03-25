export function totalCost(state){
	return state.cart.reduce((sum, product) => {
		return (parseFloat(product.price) * product.qty) + sum
	}, 0)
}

export function totalProducts(state){
	return state.cart.reduce((sum, product) => {
		return parseInt(product.qty) + sum
	}, 0)
	// return state.cart.length
}
