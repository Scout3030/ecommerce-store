export function totalCost(state){
	return state.cart.reduce((sum, product) => {
		return Math.round((parseFloat(product.price) * product.qty)*100)/100 + Math.round(sum*100)/100
	}, 0)
}

export function totalProducts(state){
	return state.cart.reduce((sum, product) => {
		return parseInt(product.qty) + sum
	}, 0)
	// return state.cart.length
}
