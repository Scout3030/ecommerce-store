@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Registro'])

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>¿Eres nuevo en nuestra web?</h4>
                        <p>Encuentra cientos de materiales para tus productos</p>
                        <a class="button button-account" href="{{route('register')}}">Crea una cuenta</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Ingresa</h3>
                    <form method="POST" action="{{ route('login') }}" class="row login_form" id="contactForm" novalidate>
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">

                                <input type="checkbox" name="selector" id="f-option2" {{ old('selector') ? 'checked' : '' }}>

                                <label class="form-check-label" for="f-option2">
                                    Mantener sesión iniciada
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-login w-100">Ingresar</button>
                            <a href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->

@endsection
