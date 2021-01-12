<template>
  <div class="row">
    <div class="col-md-6 col-lg-4 col-xl-3" v-for="product in products" :key="product.id">
      <div class="card text-center card-product">
        <div class="card-product__img">
          <img class="card-img" :src="$getImageUrl('products', '300x300',product.picture)" alt="">
          <!-- <img class="card-img" src="{{$product->pathAttachment()}}" alt=""> -->
          <ul class="card-product__imgOverlay">
          <li><button @click="redirectToProduct(product)"><i class="ti-search"></i></button></li>
          <li><button @click="addToCart(product)"><i class="ti-shopping-cart"></i></button></li>
          <!-- <li><button><i class="ti-heart"></i></button></li> -->
        </ul>
        </div>
        <div class="card-body">
          <p>{{product.category.name}}</p>
          <h4 class="card-product__title"><a :href="$getProductUrl(product.slug)">{{product.name}}</a></h4>
          <p class="card-product__price">S/{{product.price}}</p>
        </div>
      </div>
    </div>
    <loader :show="show" @close="show = false"></loader>
  </div>
</template>

<script>
  import ProductCard from './../product/Card' 
  import {mapState, mapActions, mapMutations} from 'vuex'
  import Loader from './../cart/Loader'
  export default {
    data(){
      return {
        show: false
      }
    },
    mounted(){
      this.fetchBestSellers()
    },
    components: {
      ProductCard,
      Loader
    },
    methods:{
      ...mapMutations('cart', ['addProduct']),
      ...mapActions('product', ['fetchBestSellers']),
      addToCart(product){
        this.addProduct(product)
        this.show = true   
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