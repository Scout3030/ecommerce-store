@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Checkout'])

<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
<div class="container">
	@guest
    <div class="returning_customer">
        <div class="check_title">
            <h2>¿Tienes una cuenta? <a href="#">Click aqui para ingresat</a></h2>
        </div>
        <p>Si ya ha comprado con nosotros, ingrese sus datos en el formulario siguiente. Si es un cliente nuevo, vaya a la sección Facturación y envío.</p>
        <form class="row contact_form" action="{{route('login')}}" method="post" novalidate="novalidate">
            @csrf
            <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" placeholder="Email" id="name" name="name">
            </div>
            <div class="col-md-6 form-group p_star">
                <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password">
            </div>
            <div class="col-md-12 form-group">
                <button type="submit" value="submit" class="button button-login">Ingresar</button>
                <div class="creat_account">
                    <input type="checkbox" id="f-option" name="selector">
                    <label for="f-option">Remember me</label>
                </div>
                <a class="lost_pass" href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>
    @endguest
    <div class="billing_details">
        <div class="row">
            <div class="col-lg-8">
                <h3>Detalles de facturación (solo emisión de boletas)</h3>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="first" name="name" placeholder="Nombre / Empresa">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="last" name="name" placeholder="DNI / RUC">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="company" name="company" placeholder="Dirección">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Referencia">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="email" name="compemailany" placeholder="Teléfono">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="email" name="compemailany" placeholder="Correo electrónico">
                    </div>
                    <div class="col-md-12 form-group mb-0">
                        <div class="creat_account">
                            <h3>Detalles del envío</h3>
                            <input type="checkbox" id="f-option3" name="selector">
                            <label for="f-option3">¿Enviar a una dirección diferente?</label>
                        </div>
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Ingrese la nueva dirección o incluya información adicional importante"></textarea>
                    </div>
                </form>
            </div>
            <payment-card></payment-card>
        </div>
    </div>
</div>
</section>
<!--================End Checkout Area =================-->

@endsection