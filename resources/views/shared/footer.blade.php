<!--================ Start footer Area  =================-->
<footer class="footer">
  <div class="footer-area">
    <div class="container">
      <div class="row section_gap">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget tp_widgets">
            <h4 class="footer_title large_title">Nuestra Misión</h4>
            <p>
              Distribuir los mejores productos en la ciudad de Huamachuco
            </p>
          </div>
        </div>
        <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
          <div class="single-footer-widget tp_widgets">
            <h4 class="footer_title">Links</h4>
            <ul class="list">
              <li><a href="{{route('home')}}">Inicio</a></li>
              <li><a href="{{route('product.index')}}">Tienda</a></li>
              <li><a href="{{route('FAQ')}}">Preguntas frecuentes</a></li>
              <li><a href="{{route('reviews')}}">Opiniones</a></li>
              <li><a href="{{route('about')}}">Nosotros</a></li>
              <li><a href="{{route('contact')}}">Contacto</a></li>
            </ul>
          </div>
        </div>

        <div class="offset-lg-3 col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget tp_widgets">
            <h4 class="footer_title">Contáctanos</h4>
            <div class="ml-40">
              <p class="sm-head">
                <span class="fa fa-location-arrow"></span>
                Dirección
              </p>
              <p>{{App\Template::get()->first()->address}}</p>
              <p class="sm-head">
                <span class="fa fa-phone"></span>
                Teléfono
              </p>
              <p>{{App\Template::get()->first()->phone}}</p>
              <p class="sm-head">
                <span class="fa fa-envelope"></span>
                Correo
              </p>
              <p>{{App\Template::get()->first()->email}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="row d-flex">
        <p class="col-lg-12 footer-text text-center">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<strong>2020</strong> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
      <div class="row d-flex">
        <p class="col-lg-12 footer-text text-center">
          This store was configured <i class="fa fa-user" aria-hidden="true"></i> by <a href="javascript:void(0)">Roberth Rodríguez</a>
        </p>
      </div>
    </div>
  </div>
</footer>
<!--================ End footer Area  =================-->