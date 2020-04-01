<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$colors = Color::withCount(['products'])->orderBy('name', 'asc')->get();
		return response()->json($colors);
	}

	public function adminIndex() {
		return view('admin.color.index');
	}

	public function create() {
		$color = new Color;
		$text = 'Crear color';
		return view('admin.color.create', compact('color', 'text'));
	}

	public function store(Request $request) {
		$color = Category::create($request->input());
		return back()->with(['message' => 'Color creado correctamente', 'description' => 'Has creado una nuevo color, puedes editarlo en cualquier momento.']);
	}

	public function edit(Color $color) {
		$text = 'Actualizar color';
		return view('admin.color.create', compact('color', 'text'));
	}

	public function update(Request $request, Color $color) {
		$color->fill($request->input())->save();
		return back()->with(['message' => 'Color actualizado correctamente']);
	}

	public function destroy(Color $color) {
		$color->delete();
		return back()->with(['message' => 'Color eliminado correctamente']);
	}

	public function datatable() {
		$colors = Color::get();
		$actions = 'admin.color.datatable.actions';
		return datatables()->of($colors)
			->addColumn('actions', $actions)
			->rawColumns(['actions'])
			->toJson();
	}
}
