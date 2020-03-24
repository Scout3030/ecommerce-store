@extends('layouts.app')

@section('content')

<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="owl-carousel owl-theme s_Product_carousel">
					<div class="single-prd-item">
						<img class="img-fluid" src="{{asset('assets/img/category/s-p1.jpg')}}" alt="">
					</div>
					<!-- <div class="single-prd-item">
						<img class="img-fluid" src="{{asset('assets/img/category/s-p1.jpg')}}" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="{{asset('assets/img/category/s-p1.jpg')}}" alt="">
					</div> -->
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>{{$product->name}}</h3>
					<h2>S/{{$product->price}}</h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Categoría</span> : {{$product->category->name}}</a></li>
						<li><a href="#"><span>Disponibilidad</span> : In Stock</a></li>
					</ul>
					<p>{{$product->description}}</p>
					<div class="product_count">
          			<label for="qty">Cantidad:</label>
          			<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
						 class="increase items-count" type="button"><i class="ti-angle-left"></i></button>
						<input type="number" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty" min="1">
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
						<a class="button primary-btn" href="#">Añadir al carrito</a>
					</div>
					<div class="card_area d-flex align-items-center">
						<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
						<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
				<p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes
					and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in
					Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to
					London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an
					officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
					job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when
					showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a
					child’s painting set for her birthday and it was with this that she produced her first significant work, a
					half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly
					named ‘Hangover’ by Beryl’s husband and</p>
				<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
					more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
					the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
					more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
					streamlined plan of cooking that is more efficient for one person creating less</p>
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
									<h5>Overall</h5>
									<h4>4.0</h4>
									<h6>(03 Reviews)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on 3 Reviews</h3>
									<ul class="list">
										<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
									</ul>
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