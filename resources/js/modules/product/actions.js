import Vue from 'vue'

export async function fetchProducts ({commit}){
	
	try {
		const {data} = await Vue.axios({
			url: '/api/product'
		})
		commit('product/setProducts', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('productsError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally')
	}
}


export async function searchProducts ({commit}, [query, category, color]){
	
	let url

	if (query == null && category == null && color == null) {
		url = `/api/product/`
	}

	if (query != null && category == null && color == null) {
		url = `/api/product/search/${query}`
	}

	if (query != null && category != null && color == null) {
		url = `/api/product/search/${query}/${category}`
	}

	if (query != null && category != null && color != null) {
		url = `/api/product/search/${query}/${category}/${color}`
	}

	if (query == null && category != null && color != null) {
		url = `/api/product/search/all/${category}/${color}`
	}

	if (query == null && category == null && color != null) {
		url = `/api/product/search/all/all/${color}`
	}

	if (query == null && category != null && color == null) {
		url = `/api/product/search/all/${category}`
	}

	if (query != null && category == null && color != null) {
		url = `/api/product/search/${query}/all/${color}`
	}

	try {
		const {data} = await Vue.axios({
			url: url
		})
		commit('product/setProducts', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('productsError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally')
	}
}


export async function fetchBestSellers ({commit}){
	
	try {
		const {data} = await Vue.axios({
			url: '/api/product'
		})
		commit('product/setProducts', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('productsError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally')
	}
}