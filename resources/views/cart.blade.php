@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Carrito'])

<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<cart-page></cart-page>
	</div>
</section>
<!--================End Cart Area =================-->

@endsection