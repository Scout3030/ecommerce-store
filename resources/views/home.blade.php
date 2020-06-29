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
            <h4>Bienvenidos a</h4>
            <h1>Huamachuco Compras</h1>
            <p>La manera más simple de comprar desde casa.</p>
            <a class="button button-hero" href="{{route('product.index')}}">Ver productos</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero banner start =================-->

  <!-- ================ trending product section start ================= -->
  <section class="section-margin calc-60px">
    <div class="container">
      <div class="section-intro pb-60px">
        <p>Artículos populares en nuestra tienda</p>
        <h2>Productos <span class="section-intro__style">Más Pedidos</span></h2>
      </div>
      <home-best-seller></home-best-seller>
    </div>
  </section>
  <!-- ================ trending product section end ================= -->


  <!-- ================ offer section start ================= -->
  <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
    <div class="container">
      <div class="row">
        <div class="col-xl-5">
          <div class="offer__content text-center">
            <h3>Entrega gratuita</h3>
            <!--<h4>Productos más vendidos</h4>-->
            <p>Por compras superiores a S/150</p>
            <a class="button button--active mt-3 mt-xl-4" href="{{route('product.index')}}">Comprar ahora</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ offer section end ================= -->

  <!-- ================ Subscribe section start ================= -->
  @include('shared.newsletter')
  <!-- ================ Subscribe section end ================= -->
</main>
@endsection