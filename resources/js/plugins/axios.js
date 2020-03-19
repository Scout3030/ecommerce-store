import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

const baseURL = 'https://funerals.dev/';

axios.defaults.baseURL = baseURL;
 
Vue.use(VueAxios, axios)