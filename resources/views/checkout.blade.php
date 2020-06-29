@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Checkout'])

<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">
    	@guest
        <!--<div class="returning_customer">
            <div class="check_title">
                <h2>¿Tienes una cuenta? <a href="javascript:void(0)">Ingrese los datos de su cuenta para continuar</a></h2>
            </div>
            <p>También puede comprar como invitado, vaya a la sección de Facturación y envío.</p>
            <form class="row contact_form" action="{{route('login')}}" method="post" novalidate="novalidate">
                @csrf
                <div class="col-md-6 form-group p_star">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}" autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="button button-login">Ingresar</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">Remember me</label>
                    </div>
                    <a class="lost_pass" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>-->
        @endguest
        <billing-component></billing-component>
    </div>
</section>
<!--================End Checkout Area =================-->

@endsection