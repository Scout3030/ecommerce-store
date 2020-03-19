@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Crear cuenta'])

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>¿Tienes una cuenta?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="{{route('login')}}">Ingresa ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner">
                    <h3>Crea una cuenta</h3>
                        <form class="row login_form" action="{{ route('register') }}" id="register_form" method="POST" novalidate>
                        @csrf
                        <div class="col-md-12 form-group">

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar contraseña">

                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-register w-100">Registrarme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->

@endsection
