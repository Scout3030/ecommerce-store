<?php

namespace App\Http\Controllers;

use App;
use App\Sell;

class PDFGeneratorController extends Controller {
	public function generatePDF(Sell $sell) {
		\PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

		$sell->load('soldProducts', 'shipping');
		// return view('pdf.order', ['sell' => $sell]);
		$pdf = \PDF::loadView('pdf.order', ['sell' => $sell]);
		return $pdf->stream();
		return $pdf->download('order.pdf');
	}
}
