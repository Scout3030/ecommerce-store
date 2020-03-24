<template>
	<li class="nav-item">
		<button @click="redirectToCart()"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{totalProducts}}</span></button> 
	</li>
</template>
<script>
	import {mapGetters} from 'vuex'
	export default {
		methods: {
			redirectToCart(){
        		window.location.href ='/carrito'
        	}
		},
		computed: {
			...mapGetters('cart', ['totalProducts'])
		},
	}
</script>