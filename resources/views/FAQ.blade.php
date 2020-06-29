@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Preguntas frecuentes'])

<!--================Blog Area =================-->
<section class="blog_area single-post-area py-80px section-margin--small">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12 col-md-12 blog_details">
						<h2>¿Cúando envían mi pedido?</h2>
					</div>
					<div class="col-lg-12">
						<div class="quotes">
							Si la compra es realizada hasta las 3pm, el producto es enviado el mismo día entre las 3pm y 6pm; en otro caso, el pedido será enviado al día siguiente.
						</div>
					</div>
					<div class="col-lg-12 col-md-12 blog_details">
						<h2>¿Qué medio de envío utilizan?</h2>
					</div>
					<div class="col-lg-12">
						<div class="quotes">
							Todos nuestros productos son repartidos mediante GLOVO o RAPPI. En caso GLOVO o RAPPI no tengan covertura, los pedidos son enviados por Olva Courier.
						</div>
					</div>
					<div class="col-lg-12 col-md-12 blog_details">
						<h2>¿Qué garantía tienen los productos?</h2>
					</div>
					<div class="col-lg-12">
						<div class="quotes">
							Todo producto tiene una garantía de reenvío de un producto nuevo por fallas en la calidad.
						</div>
					</div>
					<div class="col-lg-12 col-md-12 blog_details">
						<h2>¿Cuándo envían la reposición de mi producto?</h2>
					</div>
					<div class="col-lg-12">
						<div class="quotes">
							La reposición será enviada dentro de las siguentes 24h hábiles.
						</div>
					</div>

					<div class="col-lg-12 col-md-12 blog_details">
						<h2>¿Puedo recoger yo mismo mi producto?</h2>
					</div>
					<div class="col-lg-12">
						<div class="quotes">
							Puedes recoger en nuestras instalaciones previa comunicación con nosotros.
						</div>
					</div>

				</div>
			</div>
			@include('partials.contact.card')
		</div>
	</div>
</section>
<!--================Blog Area =================-->


<!--================Instagram Area =================-->
<section class="instagram_area">
<div class="container box_1620">
  <div class="insta_btn">
    <a class="btn theme_btn" href="https://facebook.com/huamachucostore" target="_blank">Síguenos en Facebook</a>
  </div>
  <div class="instagram_image row m0">
    <a href="javascript:void(0)">
    	<img src="{{asset('assets/img/facebook/ins-1.jpg')}}" alt="">
    </a>
    <a href="javascript:void(0)">
    	<img src="{{asset('assets/img/facebook/ins-2.jpg')}}" alt="">
    </a>
    <a href="javascript:void(0)">
    	<img src="{{asset('assets/img/facebook/ins-3.jpg')}}" alt="">
    </a>
    <a href="javascript:void(0)">
    	<img src="{{asset('assets/img/facebook/ins-4.jpg')}}" alt="">
    </a>
    <a href="javascript:void(0)">
    	<img src="{{asset('assets/img/facebook/ins-5.jpg')}}" alt="">
    </a>
    <a href="javascript:void(0)">
    	<img src="{{asset('assets/img/facebook/ins-6.jpg')}}" alt="">
    </a>
  </div>
</div>
</section>
<!--================End Instagram Area =================-->


@endsection