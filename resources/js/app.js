/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import store from './store'
require('./plugins')
Vue.config.productionTip = false

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-component', require('./components/product/Card.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
  store,
  // render: h => h(App)
}).$mount('#app')