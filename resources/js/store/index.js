import Vue from 'vue'
import Vuex from 'vuex'
import category from './../modules/category'
import color from './../modules/color'
import product from './../modules/product'
import filter from './../modules/filter'
import cart from './../modules/cart'


Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  	category,
  	color,
    product,
    filter,
    cart
  }
})
