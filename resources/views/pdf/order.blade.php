<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>ORDEN DE PEDIDO N° {{$sell->id}}</title>
		<style>
			@font-face {
		font-family: Junge;
		src: url(Junge-Regular.ttf);
		}
		.clearfix:after {
		content: "";
		display: table;
		clear: both;
		}
		a {
		color: #001028;
		text-decoration: none;
		}
		body {
		font-family: Junge;
		position: relative;
		width: 100%;
		height: 29.7cm;
		margin: 0 auto;
		color: #001028;
		background: #FFFFFF;
		font-size: 14px;
		}
		.arrow {
		margin-bottom: 4px;
		}
		.arrow.back {
		text-align: right;
		}
		.inner-arrow {
		padding-right: 10px;
		height: 30px;
		display: inline-block;
		background-color: rgb(233, 125, 49);
		text-align: center;
		line-height: 30px;
		vertical-align: middle;
		}
		.arrow.back .inner-arrow {
		background-color: rgb(233, 217, 49);
		padding-right: 0;
		padding-left: 10px;
		}
		.arrow:before,
		.arrow:after {
		content:'';
		display: inline-block;
		width: 0; height: 0;
		border: 15px solid transparent;
		vertical-align: middle;
		}
		.arrow:before {
		border-top-color: rgb(233, 125, 49);
		border-bottom-color: rgb(233, 125, 49);
		border-right-color: rgb(233, 125, 49);
		}
		.arrow.back:before {
		border-top-color: transparent;
		border-bottom-color: transparent;
		border-right-color: rgb(233, 217, 49);
		border-left-color: transparent;
		}
		.arrow:after {
		border-left-color: rgb(233, 125, 49);
		}
		.arrow.back:after {
		border-left-color: rgb(233, 217, 49);
		border-top-color: rgb(233, 217, 49);
		border-bottom-color: rgb(233, 217, 49);
		border-right-color: transparent;
		}
		.arrow span {
		display: inline-block;
		width: 80px;
		margin-right: 20px;
		text-align: right;
		}
		.arrow.back span {
		margin-right: 0;
		margin-left: 20px;
		text-align: left;
		}
		h1 {
		color: #5D6975;
		font-family: Junge;
		font-size: 2.4em;
		line-height: 1.4em;
		font-weight: normal;
		text-align: center;
		border-top: 1px solid #5D6975;
		border-bottom: 1px solid #5D6975;
		margin: 0 0 2em 0;
		}
		h1 small {
		font-size: 0.45em;
		line-height: 1.5em;
		float: left;
		}
		h1 small:last-child {
		float: right;
		}
		#project {
		float: left;
		}
		#company {
		float: right;
		}
		table {
		width: 100%;
		border-collapse: collapse;
		border-spacing: 0;
		margin-bottom: 30px;
		}
		table th,
		table td {
		text-align: center;
		}
		table th {
		padding: 5px 20px;
		color: #5D6975;
		border-bottom: 1px solid #C1CED9;
		white-space: nowrap;
		font-weight: normal;
		}
		table .service,
		table .desc {
		text-align: left;
		}
		table td {
		padding: 20px;
		text-align: right;
		}
		table td.service,
		table td.desc {
		vertical-align: top;
		}
		table td.unit,
		table td.qty,
		table td.total {
		font-size: 1.2em;
		}
		table td.sub {
		border-top: 1px solid #C1CED9;
		}
		table td.grand {
		border-top: 1px solid #5D6975;
		}
		table tr:nth-child(2n-1) td {
		background: #EEEEEE;
		}
		table tr:last-child td {
		background: #DDDDDD;
		}
		#details {
		margin-bottom: 30px;
		}
		footer {
		color: #5D6975;
		width: 100%;
		height: 30px;
		position: absolute;
		bottom: 0;
		border-top: 1px solid #C1CED9;
		padding: 8px 0;
		text-align: center;
		}
		</style>
	</head>
	<body>
		<main>
			<h1  class="clearfix">
				<small>
					<span>Recepción</span>
					<br />{{$sell->created_at->format('d-M-Y')}}
				</small>
				HUAMACHUCO COMPRAS
			</h1>
			<table>
				<thead>
					<tr>
						<th class="service">PRODUCTO</th>
						<th class="desc">DESCRIPCION</th>
						<th>PRECIO</th>
						<th>CANTIDAD</th>
						<th>TOTAL</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sell->soldProducts as $product)
					<tr>
						<td class="service">{{$product->product->name}}</td>
						<td class="desc">{{$product->product->short_description}}</td>
						<td class="unit">S/{{$product->product->price}}</td>
						<td class="qty">{{$product->qty}}</td>
						<td class="total">S/{{$product->product->price * $product->qty}}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="4" class="sub">SUBTOTAL</td>
						<td class="total">S/{{$sell->amount}}</td>
					</tr>
					<tr>
						<td colspan="4">ENTREGA</td>
						<td class="total">S/{{$sell->shipping->price}}</td>
					</tr>
					<tr>
						<td colspan="4" class="grand total">TOTAL</td>
						<td class="grand total">S/{{$sell->amount + $sell->shipping->price}}</td>
					</tr>
				</tbody>
			</table>
			<div id="details" class="clearfix">
				<div id="project">

					<div class="arrow">
						<div class="inner-arrow"><span>CLIENTE</span>
							{{$sell->client_name}}</div>
					</div>
					<div class="arrow">
						<div class="inner-arrow"><span>DIRECCIÓN</span> {{$sell->client_address}}</div>
					</div>
					<div class="arrow">
						<div class="inner-arrow"><span>REFERENCIA</span>
						{{$sell->client_message}}</div>
					</div>
					<div class="arrow">
						<div class="inner-arrow"><span>TELÉFONO</span>
							{{$sell->client_phone}}</div>
					</div>
				</div>
				<div id="company">
					<div class="arrow back">
						<div class="inner-arrow">HUMACHUCO COMPRAS</div>
					</div>
					<div class="arrow back">
						<div class="inner-arrow">Jr. Leoncio Prado 570, Huamachuco </div>
					</div>
					<div class="arrow back">
						<div class="inner-arrow">+51 944-001458</div>
					</div>
					<div class="arrow back">
						<div class="inner-arrow"><a href="mailto:pedidos@huamachucostore.com">pedidos@huamachucostore.com</a></div>
					</div>
				</div>
			</div>
			<div id="notices">
				<div>NOTA:</div>
				<div class="notice">Los pedidos son entregados en un plazo máximo de 24 horas  de haber hecho la recepción.</div>
			</div>
		</main>
		<footer>
			Todos nuestros productos tienen garantía de entrega.
		</footer>
	</body>
</html>