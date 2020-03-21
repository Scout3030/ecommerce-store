import Vue from 'vue'

export async function fetchCategories ({commit}){
	
	try {
		const {data} = await Vue.axios({
			url: '/api/category'
		})
		commit('category/setCategories', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('categoriesError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally categories')
	}
}