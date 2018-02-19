<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller {

	public function __construct() {
		$this->middleware('level', ['except' => ['show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$tags = Tag::all();

		return view('tag.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
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

		$tag = new Tag;

		$tag->name = $request->get('name');
		$tag->slug = Helper::getSlug($tag->name);

		$tag->save();

		return back()->with('success', "Đã thêm tag {$request->name}");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug) {
		$tag = Tag::whereSlug($slug)->firstOrFail();

		return view('tag.show_back_end', compact('tag'));
	}

	public function showFrontEnd($slug) {
		$tag = Tag::with('posts')->whereSlug($slug)->firstOrFail();

		return view('tag.show_front_end')->withTag($tag);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

//		return view('tag.edit', );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$tag = Tag::findOrFail($id);

		$tag->posts()->detach();

		$tag->delete();

		return back()->with('success', "Đã xóa tag $tag->name");
	}
}
