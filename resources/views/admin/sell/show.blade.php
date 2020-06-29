@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Pedido', 'icon' => 'pe-7s-menu'])
@endsection

@section('content')
<div class="row">
<div class="col-lg-6">
    <div class="main-card mb-3 card">
        <ul class="list-group list-group-flush">
            @foreach($sell->soldProducts as $product)
            <li class="list-group-item">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-3">
                            <img width="42" class="rounded-circle" src="{{$product->product->pathAttachment()}}" alt="">
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">{{$product->product->name}}</div>
                            <div class="widget-subheading">A short profile description</div>
                        </div>
                        <div class="widget-content-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button type="button" class="btn-shadow btn btn-primary">{{$product->qty}} unidades</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="col-lg-6">
    <div class="mb-3 text-white card-border bg-dark card">
        <div class="card-header"><i class="header-icon lnr-screen icon-gradient bg-warm-flame"> </i>{{$sell->client_name}}
        </div>
        <div class="card-body">
            <p>Dirección: {{$sell->client_address}}</p>
            <p>Teléfono: {{$sell->client_phone}}</p>
            <p>Referencia: {{$sell->client_message}}</p>
        </div>
        <div class="d-block text-right card-footer">
            <form action="{{route('admin.sell.complete', $sell->id)}}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-warning btn-block">Completar orden</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

