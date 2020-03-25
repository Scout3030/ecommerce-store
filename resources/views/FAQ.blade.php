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
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget author_widget">
						<img class="author_img rounded-circle" src="{{asset('assets/img/blog/author.png')}}" alt="">
						<h3>{{App\Template::get()->first()->phone}}</h3>
						<p>¿Tienes consultas?</p>
						<div class="social_icon">
							<a href="#">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a href="#">
								<i class="fab fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fab fa-github"></i>
							</a>
							<a href="#">
								<i class="fab fa-behance"></i>
							</a>
						</div>
						<p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
							have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
							detractors.
						</p>
						<div class="br"></div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================Blog Area =================-->


<!--================Instagram Area =================-->
<section class="instagram_area">
<div class="container box_1620">
  <div class="insta_btn">
    <a class="btn theme_btn" href="#">Síguenos en Facebook</a>
  </div>
  <div class="instagram_image row m0">
    <a href="#"><img src="{{asset('assets/img/instagram/ins-1.jpg')}}" alt=""></a>
    <a href="#"><img src="{{asset('assets/img/instagram/ins-2.jpg')}}" alt=""></a>
    <a href="#"><img src="{{asset('assets/img/instagram/ins-3.jpg')}}" alt=""></a>
    <a href="#"><img src="{{asset('assets/img/instagram/ins-4.jpg')}}" alt=""></a>
    <a href="#"><img src="{{asset('assets/img/instagram/ins-5.jpg')}}" alt=""></a>
    <a href="#"><img src="{{asset('assets/img/instagram/ins-6.jpg')}}" alt=""></a>
  </div>
</div>
</section>
<!--================End Instagram Area =================-->


@endsection