import Vue from 'vue'

export async function fetchCoupon ({commit}, coupon){
	
	try {
		const {data} = await Vue.axios({
			method: 'POST',
			url: '/api/coupon',
			data: {
				coupon: coupon
			}
		})
		commit('coupon/setCoupon', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('colorsError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally colors')
	}
}