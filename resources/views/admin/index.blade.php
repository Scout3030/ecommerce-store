@extends('layouts.admin-app')

@section('content')

<!-- @ include('admin.dashboard.widgets') -->

<!-- <sales-chart></sales-chart> -->
<div class="row">
	<div class="col-sm-12 col-md-7 col-lg-6">
		<div class="mb-3 card">
			<div class="card-header-tab card-header">
				<div class="card-header-title font-size-lg text-capitalize font-weight-normal">Productos más vendidos</div>
				<div class="btn-actions-pane-right text-capitalize">
					<button class="btn btn-warning">Acciones</button>
				</div>
			</div>
			<div class="pt-0 card-body">
				<best-selling></best-selling>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-7 col-lg-6">
		<div class="mb-3 card">
			<div class="card-header-tab card-header">
				<div class="card-header-title font-size-lg text-capitalize font-weight-normal">Ingresos y egresos en la ultima semana</div>
				<div class="btn-actions-pane-right text-capitalize">
					<button class="btn btn-warning">Acciones</button>
				</div>
			</div>
			<div class="pt-0 card-body">
				<prueba></prueba>
			</div>
		</div>
	</div>
</div>

<!-- @ include('admin.dashboard.best-selling-products') -->

<!-- @ include('admin.dashboard.sales-cost-graphic') -->

@endsection