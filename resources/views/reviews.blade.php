@extends('layouts.app')

@section('content')

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<div class="tab-pane fade show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			<div class="row">
				<div class="col-lg-6">
					<div class="comment_list">
						<div class="review_item">
							<div class="media">
								<div class="d-flex">
									<img src="{{asset('assets/img/product/review-1.png')}}" alt="">
								</div>
								<div class="media-body">
									<h4>Blake Ruiz</h4>
									<h5>12th Feb, 2018 at 05:56 pm</h5>
									<a class="reply_btn" href="#">Reply</a>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
							commodo</p>
						</div>
						<div class="review_item reply">
							<div class="media">
								<div class="d-flex">
									<img src="{{asset('assets/img/product/review-2.png')}}" alt="">
								</div>
								<div class="media-body">
									<h4>Blake Ruiz</h4>
									<h5>12th Feb, 2018 at 05:56 pm</h5>
									<a class="reply_btn" href="#">Reply</a>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
							commodo</p>
						</div>
						<div class="review_item">
							<div class="media">
								<div class="d-flex">
									<img src="{{asset('assets/img/product/review-3.png')}}" alt="">
								</div>
								<div class="media-body">
									<h4>Blake Ruiz</h4>
									<h5>12th Feb, 2018 at 05:56 pm</h5>
									<a class="reply_btn" href="#">Reply</a>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
							commodo</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="review_box">
						<h4>Danos tu opinion</h4>
						<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="message" id="message" rows="4" placeholder="Mensaje"></textarea>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	<!--================End Product Description Area =================-->

@endsection