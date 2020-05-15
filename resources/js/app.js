/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');

import store from './store'
require('./plugins')
Vue.config.productionTip = false

Vue.component('filter-component', require('./components/filter/Filter.vue').default);
Vue.component('categories-filter', require('./components/filter/Category.vue').default);
Vue.component('colors-filter', require('./components/filter/Color.vue').default);
Vue.component('cart-component', require('./components/cart/Cart.vue').default);
Vue.component('cart-page', require('./components/cart/CartPage.vue').default);
Vue.component('home-best-seller', require('./components/home/BestSeller.vue').default);
Vue.component('billing-component', require('./components/checkout/Billing.vue').default);
Vue.component('product-detail', require('./components/product/Detail.vue').default);
Vue.component('newsletter-component', require('./components/template/Newsletter.vue').default);


/*=============================================
=            Section comment block            =
=============================================*/

Vue.component('sales-chart', require('./components/dashboard/Sales.vue').default);
Vue.component('best-selling', require('./components/dashboard/BestSelling.vue').default);
Vue.component('prueba', require('./components/dashboard/Prueba.vue').default);
/*=====  End of Section comment block  ======*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
  store,
  // render: h => h(App)
}).$mount('#app')