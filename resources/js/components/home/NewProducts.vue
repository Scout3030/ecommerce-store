<template>
  <div class="owl-carousel owl-theme" id="bestSellerCarousel">
    <div class="card text-center card-product" v-for="product in products">
      <div class="card-product__img">
        <img class="img-fluid" :src="getImage(product.picture)" alt="">
        <ul class="card-product__imgOverlay">
          <li><button @click="redirectToProduct(product)"><i class="ti-search"></i></button></li>
          <li><button @click="addToCart(product)"><i class="ti-shopping-cart"></i></button></li>
          <!-- <li><button><i class="ti-heart"></i></button></li> -->
        </ul>
      </div>
      <div class="card-body">
        <p>{{product.category.name}}</p>
        <h4 class="card-product__title"><a href="route('product.show', $product->slug)">{{product.name}}</a></h4>
        <p class="card-product__price">S/{{product.price}}</p>
      </div>
    </div>
  </div>
</template>

<script>
  import ProductCard from './../product/Card' 
  import {mapState, mapActions, mapMutations} from 'vuex'
  export default {
    mounted(){
      this.fetchBestSellers()
    },
    components: {
      ProductCard
    },
    methods:{
      ...mapMutations('cart', ['addProduct']),
      ...mapActions('product', ['fetchBestSellers']),
      getImage(attachment){
        return `/images/products/${attachment}`
      },
      addToCart(product){
        console.log(product)
        this.addProduct(product)
      },
      redirectToProduct(product){
        window.open(`/producto/${product.slug}`, '_blank');
      }

    },
    computed : {
      ...mapState('product', ['products'])
    }
  }
</script>