@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Confirmación de pedido'])

<!--================Order Details Area =================-->
<section class="order_details section-margin--small">
    <div class="container">
        <p class="text-center billing-alert">Muchas gracias, hemos recibido tu pedido.</p>
        <div class="row mb-5">
            <div class="col-md-6 col-xl-6 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Información del pedido</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Número de orden</td>
                            <td>: {{$sell->id}}</td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td>: {{$sell->created_at->format('d-M-Y')}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>: S/ {{$sell->amount}}</td>
                        </tr>
                        <tr>
                            <td>Método de pago</td>
                            <td>: {{$sell->paymentMethod->name}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-xl-6 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Detalles de la entrega</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Dirección</td>
                            <td>: {{$sell->client_address}}</td>
                        </tr>
                        <tr>
                            <td>Persona que recibe</td>
                            <td>: {{$sell->client_name}}</td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td>: {{$sell->client_phone}}</td>
                        </tr>
                        <tr>
                            <td>Datos adicionales</td>
                            <td>: {{$sell->client_message}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Detalles del pedido</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sell->soldProducts as $product)
                        <tr>
                            <td>
                                <p>{{$product->product->name}}</p>
                            </td>
                            <td>
                                <h5>x {{$product->product->qty}}</h5>
                            </td>
                            <td>
                                <p>S/{{$product->qty * $product->product->price}}</p>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>S/ {{$sell->amount}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Entrega</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            @if($sell->amount < 150)
                            <td>
                                <p>S/5.00 (varia dependiendo de la distancia y el peso)</p>
                            </td>
                            @else
                            <td>
                                <p>Gratis</p>
                            </td>
                            @endif
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <h4>S/{{$sell->amount + $sell->shipping->price}}</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Order Details Area =================-->

@endsection

@push('scripts')
<script>

    window.localStorage.clear();

</script>
@endpush