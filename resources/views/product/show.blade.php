@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/vendors/linericon/style.css')}}">
@endpush

@section('content')

<!--================Single Product Area =================-->
<product-detail :product="{{$product}}"></product-detail>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descripción</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
				 aria-selected="false">Especificaciones</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
				 aria-selected="false">Opiniones</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p>{{$product->long_description}}</p>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<h5>Width</h5>
								</td>
								<td>
									<h5>128mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Height</h5>
								</td>
								<td>
									<h5>508mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Depth</h5>
								</td>
								<td>
									<h5>85mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Weight</h5>
								</td>
								<td>
									<h5>52gm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Quality checking</h5>
								</td>
								<td>
									<h5>yes</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Freshness Duration</h5>
								</td>
								<td>
									<h5>03days</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>When packeting</h5>
								</td>
								<td>
									<h5>Without touch of hand</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Each Box contains</h5>
								</td>
								<td>
									<h5>60pcs</h5>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Promedio</h5>
									<h4>{{$product->custom_rating}}</h4>
									<h6>({{$product->reviews_count}} revisiones)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Basado en {{count($product->reviews)}} revisiones</h3>
									@include('partials.product.stars')
								</div>
							</div>
						</div>
						<div class="review_list">
							@forelse($product->reviews as $review)
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="{{$review->user->pathAttachment()}}" alt="">
									</div>
									<div class="media-body">
										<h4>{{ucfirst($review->user->name)}}</h4>
										@include('partials.product.rating', ['rating' => $review->rating])
									</div>
								</div>
								<p>{{$review->comment}}</p>
							</div>
							@empty
							<div class="review_item">
								<p>Este producto aún no tiene comentarios</p>
							</div>
							@endforelse

						</div>
					</div>
					@include('partials.product.review-form')
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->


<!--================ Start related Product area =================-->
<section class="related-product-area section-margin--small mt-0">
	<div class="container">
		<div class="section-intro pb-60px">
			<p>Tambien te puede interesar</p>
			<h2>Productos <span class="section-intro__style">Relacionados ({{count($related)}})</span></h2>
		</div>
		<div class="row mt-30">
			@include('shared.footer-products', $products = $related)
		</div>
	</div>
</section>
<!--================ end related Product area =================-->

@endsection