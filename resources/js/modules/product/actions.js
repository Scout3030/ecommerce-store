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


export async function searchProducts ({commit}, url){

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
			url: '/api/best-seller'
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