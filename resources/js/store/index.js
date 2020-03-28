import Vue from 'vue'
import Vuex from 'vuex'
import category from './../modules/category'
import color from './../modules/color'
import product from './../modules/product'
import filter from './../modules/filter'
import cart from './../modules/cart'
import shipping from './../modules/shipping'
import paymentmethod from './../modules/paymentmethod'
import coupon from './../modules/coupon'

import VuexPersistence from 'vuex-persist'

Vue.use(Vuex)

const vuexLocal = new VuexPersistence({
  storage: window.localStorage,
  modules: ['cart', 'shipping']
});

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
    cart,
    shipping,
    paymentmethod,
    coupon
  },
  plugins: [vuexLocal.plugin]
})
