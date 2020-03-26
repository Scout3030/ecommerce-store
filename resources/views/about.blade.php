@extends('layouts.app')
@section('content')
<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<div class="categories_post">
					<img class="card-img rounded-0" src="{{asset('assets/img/blog/cat-post/cat-post-3.jpg')}}" alt="post">
					<div class="categories_details">
						<div class="categories_text">
							<a href="single-blog.html">
								<h5>Social Life</h5>
							</a>
							<div class="border_line"></div>
							<p>Enjoy your social life together</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<div class="categories_post">
					<img class="card-img rounded-0" src="{{asset('assets/img/blog/cat-post/cat-post-2.jpg')}}" alt="post">
					<div class="categories_details">
						<div class="categories_text">
							<a href="single-blog.html">
								<h5>Politics</h5>
							</a>
							<div class="border_line"></div>
							<p>Be a part of politics</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<div class="categories_post">
					<img class="card-img rounded-0" src="{{asset('assets/img/blog/cat-post/cat-post-1.jpg')}}" alt="post">
					<div class="categories_details">
						<div class="categories_text">
							<a href="single-blog.html">
								<h5>Food</h5>
							</a>
							<div class="border_line"></div>
							<p>Let the food be finished</p>
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
								<div class="post_tag">
									<a href="#">Food,</a>
									<a class="active" href="#">Technology,</a>
									<a href="#">Politics,</a>
									<a href="#">Lifestyle</a>
								</div>
								<ul class="blog_meta list">
									<li>
										<a href="#">Mark wiens
											<i class="lnr lnr-user"></i>
										</a>
									</li>
									<li>
										<a href="#">12 Dec, 2017
											<i class="lnr lnr-calendar-full"></i>
										</a>
									</li>
									<li>
										<a href="#">1.2M Views
											<i class="lnr lnr-eye"></i>
										</a>
									</li>
									<li>
										<a href="#">06 Comments
											<i class="lnr lnr-bubble"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="blog_post">
								<img src="{{asset('assets/img/blog/main-blog/m-blog-1.jpg')}}" alt="">
								<div class="blog_details">
									<a href="single-blog.html">
										<h2>Astronomy Binoculars A Great Alternative</h2>
									</a>
									<p>MCSE boot camps have its supporters and its detractors. Some people do not understand
										why you should have to spend money on boot camp when you can get the MCSE study
									materials yourself at a fraction.</p>
									<a class="button button-blog" href="single-blog.html">View More</a>
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