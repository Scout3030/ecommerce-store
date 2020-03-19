@extends('layouts.app')

@section('content')
<main class="site-main">
  <!--================ Hero banner start =================-->
  <section class="hero-banner">
    <div class="container">
      <div class="row no-gutters align-items-center pt-60px">
        <div class="col-5 d-none d-sm-block">
          <div class="hero-banner__img">
            <img class="img-fluid" src="{{asset('assets/img/home/hero-banner.png')}}" alt="">
          </div>
        </div>
        <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
          <div class="hero-banner__content">
            <h4>Shop is fun</h4>
            <h1>Browse Our Premium Product</h1>
            <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
            <a class="button button-hero" href="#">Browse Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero banner start =================-->

  <!--================ Hero Carousel start =================-->
  <section class="section-margin mt-0">
    <div class="owl-carousel owl-theme hero-carousel">
      @foreach($categories as $category)
      <div class="hero-carousel__slide">
        <img src="{{asset('assets/img/home/hero-slide1.png')}}" alt="" class="img-fluid">
        <a href="#" class="hero-carousel__slideOverlay">
          <h3>{{$category->name}}</h3>
          <p>Accessories Item</p>
        </a>
      </div>
      @endforeach
    </div>
  </section>
  <!--================ Hero Carousel end =================-->

  <!-- ================ trending product section start ================= -->
  <section class="section-margin calc-60px">
    <div class="container">
      <div class="section-intro pb-60px">
        <p>Artículos populares en nuestra tienda</p>
        <h2>Productos <span class="section-intro__style">Más Pedidos</span></h2>
      </div>
      <div class="row">

        @foreach($topProducts as $product)
        <div class="col-md-6 col-lg-4 col-xl-3">
          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="card-img" src="{{asset('assets/img/product/product1.png')}}" alt="">
              <!-- <img class="card-img" src="{{$product->pathAttachment()}}" alt=""> -->
              <ul class="card-product__imgOverlay">
                <li><button><i class="ti-search"></i></button></li>
                <li><button><i class="ti-shopping-cart"></i></button></li>
                <li><button><i class="ti-heart"></i></button></li>
              </ul>
            </div>
            <div class="card-body">
              <p>{{$product->category->name}}</p>
              <h4 class="card-product__title"><a href="{{route('product.show', $product->slug)}}">{{$product->name}}</a></h4>
              <p class="card-product__price">S/{{$product->price}}</p>
            </div>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </section>
  <!-- ================ trending product section end ================= -->


  <!-- ================ offer section start ================= -->
  <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
    <div class="container">
      <div class="row">
        <div class="col-xl-5">
          <div class="offer__content text-center">
            <h3>Hasta 35% de descuento</h3>
            <h4>Productos más vendidos</h4>
            <p>Por compras superiores a S/100</p>
            <a class="button button--active mt-3 mt-xl-4" href="#">Comprar ahora</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ offer section end ================= -->

  <!-- ================ Best Selling item  carousel ================= -->
  <section class="section-margin calc-60px">
    <div class="container">
      <div class="section-intro pb-60px">
        <p>Nuevos en nuestra tienda</p>
        <h2>Productos <span class="section-intro__style">Nuevos</span></h2>
      </div>
      <div class="owl-carousel owl-theme" id="bestSellerCarousel">
        @foreach($news as $product)
        <div class="card text-center card-product">
          <div class="card-product__img">
            <img class="img-fluid" src="{{asset('assets/img/product/product1.png')}}" alt="">
            <ul class="card-product__imgOverlay">
              <li><button><i class="ti-search"></i></button></li>
              <li><button><i class="ti-shopping-cart"></i></button></li>
              <li><button><i class="ti-heart"></i></button></li>
            </ul>
          </div>
          <div class="card-body">
            <p>{{$product->category->name}}</p>
            <h4 class="card-product__title"><a href="single-product.html">{{$product->name}}</a></h4>
            <p class="card-product__price">S/{{$product->price}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- ================ Best Selling item  carousel end ================= -->

  <!-- ================ Subscribe section start ================= -->
  <section class="subscribe-position">
    <div class="container">
      <div class="subscribe text-center">
        <h3 class="subscribe__title">Mantente actualizado</h3>
        <p>Recibe información sobre ofertas y promociones directamente en tu correo electrónico</p>
        <div id="mc_embed_signup">
          <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
            <div class="form-group ml-sm-auto">
              <input class="form-control mb-1" type="email" name="email" placeholder="Ingresa tu correo electrónico" >
              <div class="info"></div>
            </div>
            <button class="button button-subscribe mr-auto mb-1" type="submit">Suscribirme</button>


          </form>
        </div>

      </div>
    </div>
  </section>
  <!-- ================ Subscribe section end ================= -->
</main>
@endsection