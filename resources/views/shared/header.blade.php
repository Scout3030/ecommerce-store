<!--================ Start Header Menu Area =================-->
<header class="header_area">
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
            <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('product.index')}}">Tienda</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contacto</a></li>
          </ul>

          <ul class="nav-shop">
            <li class="nav-item"><button><i class="ti-search"></i></button></li>
            <cart-component></cart-component>
            @include('partials.navigation.'.\App\User::navigation())
            <!-- <li class="nav-item"><a href="{{route('register')}}">Registrate</a></li> -->
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
<!--================ End Header Menu Area =================