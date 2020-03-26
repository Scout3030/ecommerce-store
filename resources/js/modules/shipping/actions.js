import Vue from 'vue'

export async function fetchShippingMethods ({commit}){
	try {
		const {data} = await Vue.axios({
			
			url: '/api/shipping'
		})
		commit('shipping/setShippingMethods', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('colorsError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally shipping methods')
	}
}