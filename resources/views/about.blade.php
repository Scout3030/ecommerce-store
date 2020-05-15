@extends('layouts.app')
@section('content')
<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<div class="categories_post">
					<img class="card-img rounded-0" src="{{asset('assets/img/services/desktop-design.jpg')}}" alt="post">
					<div class="categories_details">
						<div class="categories_text">
							<a href="single-blog.html">
								<h5>Aplicaciones de escritorio</h5>
							</a>
							<div class="border_line"></div>
							<p>Sistemas de ventas</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<div class="categories_post">
					<img class="card-img rounded-0" src="{{asset('assets/img/services/web-design.jpg')}}" alt="post">
					<div class="categories_details">
						<div class="categories_text">
							<a href="single-blog.html">
								<h5>Aplicaciones web</h5>
							</a>
							<div class="border_line"></div>
							<p>Sistemas de reserva de hoteles</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<div class="categories_post">
					<img class="card-img rounded-0" src="{{asset('assets/img/services/digital-marketing.jpg')}}" alt="post">
					<div class="categories_details">
						<div class="categories_text">
							<a href="single-blog.html">
								<h5>Marketing digital</h5>
							</a>
							<div class="border_line"></div>
							<p>Publicidad digital</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================Blog Categorie Area =================-->
<!--================Blog Area =================-->
<section class="blog_area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="blog_left_sidebar">
					<article class="row blog_item">
						<div class="col-md-3">
							<div class="blog_info text-right">

								<ul class="blog_meta list">
									<li>
										<a href="javascript:void(0)">3 años de experiencia
											<i class="lnr lnr-bubble"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">Aplicaciones de escritorio
											<i class="lnr lnr-user"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">Aplicaciones web
											<i class="lnr lnr-calendar-full"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">Aplicaciones móviles
											<i class="lnr lnr-eye"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">Diseño gráfico
											<i class="lnr lnr-bubble"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="blog_post">
								<img src="{{asset('assets/img/template/logo.jpg')}}" alt="">
								<div class="blog_details">
									<a href="single-blog.html">
										<h2>Somos Huamachuco Digital</h2>
									</a>
									<p>Una empresa huamachuquina con más de 3 años de experiencia en proyectos digitales.</p>
									<p>Digitalizando Huamachuco...</p>
									<a class="button button-blog" href="https://wa.me/51969449655" target="_blank">Contactar</a>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
			@include('partials.contact.card')
		</div>
	</div>
</section>
<!--================Blog Area =================-->
@endsection