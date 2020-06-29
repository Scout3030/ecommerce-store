@component('mail::message')

# {{ __("Nueva orden registrada en el sistema!") }}

@component('mail::table')
| Cliente      | Dirección      | Teléfono   | Datos adicionales |
| ------------- |-------------:|:-------------:| --------:|
|{{$sell->client_name}}|{{$sell->client_address}}|{{$sell->client_phone}} |{{$sell->client_message}}|

@endcomponent

@component('mail::table')
| Pago |
| --------:|
|{{$sell->paymentMethod->name}}|

@endcomponent

@component('mail::table')
| Producto      | Cantidad      | Precio   |
| ------------- |:-------------:| --------:|
@foreach($sell->soldProducts as $product)
| {{$product->product->name}}      | {{$product->qty}}     | S/  {{$product->qty * $product->product->price}}    |
@endforeach
@endcomponent

@component('mail::button', ['url' => url('/dashboard')])
    {{ __("Ir a la plataforma") }}
@endcomponent

{{ __("Gracias") }},<br>
{{ config('app.name') }}

@endcomponent