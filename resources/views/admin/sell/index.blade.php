@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Todos las categorías', 'icon' => 'pe-7s-menu'])
@endsection

@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <table style="width: 100%;" id="categories-table" class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Cliente</th>
                <th>Precio productos</th>
                <th>Envío</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th>id</th>
                <th>Cliente</th>
                <th>Precio productos</th>
                <th>Envío</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th>Fecha</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@push('scripts')
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        let dt;
        $(document).ready(function() {
            dt = $("#categories-table").DataTable({
                pageLength: 5,
                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.sell.datatable') }}',
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'id', visible: false},
                    {data: 'client_name'},
                    {data: 'amount'},
                    {data: 'shipping.name'},
                    {data: 'client_address'},
                    {data: 'status'},
                    {data: 'actions'},
                    {data: 'created_at'}
                ],
                order: [[ 7, "desc" ]]
            });

            setInterval( function () {
                dt.ajax.reload();
            }, 30000 );
        })
    </script>
@endpush