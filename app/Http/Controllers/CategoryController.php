<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helper\Helper;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	public function __construct() {
		$this->middleware('level', ['except' => ['show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$categories = Category::all();

		return view('category.index', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|max:255'
		]);

		$category = new Category();

		$category->name = $request->get('name');
		$category->slug = Helper::getSlug($category->name);

		$category->save();

		return back()->with('success', "Đã thêm chuyên mục {$request->name}");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$category = Category::findOrFail($id);

		$category->delete();

		return back()->with('success', "Đã xóa chuyên mục {$category->name}");
	}

	public function show($slug) {
		$category = Category::whereSlug($slug)->firstOrFail();

		$posts = $category->posts()->where('is_draft', 0)->get();

		return view('category.show', compact('category', 'posts'));
	}
}
