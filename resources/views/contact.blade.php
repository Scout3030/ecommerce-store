@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Contacto'])

<!-- ================ contact section start ================= -->
<section class="section-margin--small">
<div class="container">
  <div class="d-none d-sm-block mb-5 pb-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7507036517477!2d-78.04976908584531!3d-7.8161918797801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ade54d6f9a9c43%3A0x62af0310a0e88d6e!2sCOPYTEF%20%C2%A1IMPRESI%C3%93NATE*21!5e0!3m2!1ses!2spe!4v1589608957488!5m2!1ses!2spe" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>


  <div class="row">
    <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-home"></i></span>
        <div class="media-body">
          <h3>{{App\Template::get()->first()->address}}</h3>
          <p>Lima</p>
        </div>
      </div>
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
        <div class="media-body">
          <h3><a href="tel:{{App\Template::get()->first()->phone}}">{{App\Template::get()->first()->phone}}</a></h3>
          <p>Lun a Vie 9am a 6pm</p>
        </div>
      </div>
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-email"></i></span>
        <div class="media-body">
          <h3><a href="mailto:support@colorlib.com">{{App\Template::get()->first()->email}}</a></h3>
          <p>Envíanos un mensaje a cualquier hora!</p>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-lg-9">
      <form action="{{route('contact.post')}}" class="form-contact contact_form" action="" method="post"  novalidate>
        @csrf
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <input class="form-control" name="name" id="name" type="text" placeholder="Ingresa tu nombre" autocomplete="off">
            </div>
            <div class="form-group">
              <input class="form-control" name="email" id="email" type="email" placeholder="Ingresa tu correo" autocomplete="off">
            </div>
            <div class="form-group">
              <input class="form-control" name="subject" id="subject" type="text" placeholder="Ingresa el asunto" autocomplete="off">
            </div>
          </div>
          <div class="col-lg-7">
            <div class="form-group">
                <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Ingresa tu mensaje"></textarea>
            </div>
          </div>
        </div>
        <div class="form-group text-center text-md-right mt-3">
          <button type="submit" class="button button--active button-contactForm">Enviar mensaje</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<!-- ================ contact section end ================= -->

@endsection

@push('scripts')

<script src="{{asset('assets/vendors/jquery.form.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/contact.js')}}"></script>
<!--<script>
  function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var grayStyles = [
      {
        featureType: "all",
        stylers: [
          { saturation: -90 },
          { lightness: 50 }
        ]
      },
      {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
    ];
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -7.8161919, lng: -78.0497691},
      zoom: 15.25,
      styles: grayStyles,
      scrollwheel:  false
    });
  }

  $(document).ready(function(){
    initMap()
  })

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>-->
@endpush