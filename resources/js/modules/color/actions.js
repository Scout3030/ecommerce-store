import Vue from 'vue'

export async function fetchColors ({commit}){
	
	try {
		const {data} = await Vue.axios({
			
			url: '/api/color'
		})
		commit('color/setColors', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('colorsError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally colors')
	}
}