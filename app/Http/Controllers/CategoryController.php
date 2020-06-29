<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function index() {
		$categories = Category::withCount(['products'])->orderBy('name', 'asc')->get();
		return response()->json($categories);
	}

	public function adminIndex() {
		return view('admin.category.index');
	}

	public function create() {
		$category = new Category;
		$text = 'Crear categoría';
		return view('admin.category.create', compact('category', 'text'));
	}

	public function store(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|unique|max:50',
			'picture' => 'required',
		]);
		$picture = Helper::uploadFile('picture', 'categories');
		$request->merge(['picture' => $picture]);
		$category = Category::create($request->input());
		return back()->with(['message' => 'Categoría creada correctamente', 'description' => 'Has creado una nueva categoría, puedes editarla en cualquier momento.']);
	}

	public function edit(Category $category) {
		$text = 'Actualizar categoría';
		return view('admin.category.create', compact('category', 'text'));
	}

	public function update(Request $request, Category $category) {
		$validatedData = $request->validate([
			'name' => 'required|unique|max:50',
		]);
		if ($request->hasFile('picture')) {
			\Storage::delete('courses/' . $course->picture);
			$picture = Helper::uploadFile("picture", 'courses');
			$request->merge(['picture' => $picture]);
		}
		$category->fill($request->input())->save();
		return back()->with(['message' => 'Categoría actualizada correctamente']);
	}

	public function destroy(Category $category) {
		$category->delete();
		return back()->with(['message' => 'Proucto eliminado correctamente']);
	}

	public function datatable() {
		$categories = Category::get();
		$actions = 'admin.category.datatable.actions';
		return datatables()->of($categories)
			->addColumn('actions', $actions)
			->rawColumns(['actions'])
			->toJson();
	}
}
