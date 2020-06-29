@if($status == App\Sell::FINISHED)
<div class="mb-2 mr-2 badge  badge-success">Finalizada</div>
@endif

@if($status == App\Sell::INPROCESS)
<div class="mb-2 mr-2 badge badge-pill badge-warning">En proceso</div>
@endif

@if($status == App\Sell::REJECTED)
<div class="mb-2 mr-2 badge badge-danger">Cancelada</div>
@endif