@extends('layouts.app')

@section('content')

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<div class="tab-pane fade show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			<div class="row">
				<div class="col-lg-6">
					<div class="comment_list">
						@foreach(App\Opinion::with(['user'])->inRandomOrder()->get()->take(4) as $opinion)
						<div class="review_item">
							<div class="media">
								<div class="d-flex">
									<img src="{{$opinion->user->pathAttachment()}}" alt="">
								</div>
								<div class="media-body">
									<h4>{{$opinion->user->name}}</h4>
									<h5>12th Feb, 2018 at 05:56 pm</h5>
								</div>
							</div>
							<p>{{$opinion->comment}}</p>
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-6">
					<div class="review_box">
						<h4>Danos tu opinion</h4>
						<form class="row contact_form" action="{{route('opinion.store')}}" method="post" id="contactForm" novalidate="novalidate">
							@csrf
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="comment" id="message" rows="4" placeholder="Mensaje">{{old('comment')}}</textarea>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<button type="submit" value="submit" class="btn primary-btn">Enviar opinión</button>
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
