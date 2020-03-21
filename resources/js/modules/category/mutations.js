export function setCategories(state, categories){
	state.categories = categories
}

export function setCategory(state, category){
	state.selectedCategory = category
}

export function categoriesError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.categories = []
}
