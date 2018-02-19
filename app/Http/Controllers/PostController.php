<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helper\Helper;
use App\Http\Requests\PostFormRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Storage;

class PostController extends Controller {

	public function __construct() {
		$this->middleware('auth');
		$this->middleware('level');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$posts = Post::paginate(10);

		return view('post.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::select(['id', 'name'])->get();

		$tags = Tag::all();

		return view('post.create', compact('categories', 'tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param PostFormRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PostFormRequest $request) {

		$post = new Post();

		$post->title = $request->get('title');
		$post->content = $request->get('content');
		$post->slug = Helper::getSlug($post->title) . "-" . (Post::count() + 1);
		$post->category_id = $request->get('category');
		$post->is_draft = $request->get('is_draft');

		if ($request->hasFile('featured_image'))
			$post->featured_image = Helper::storeImage($request->file('featured_image'));

		$post->save();

		$post->tags()->sync($request->get('tags'));

		Session::flash('success', 'Bài viết đã được lưu lại');

		return redirect()->route('posts.show', [$post->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id) {
		$post = Post::findOrFail($id);

		$category = empty($post->category) ? "Không có": $post->category->name;

		$comments = $post->comments()->whereApproved(1)->get();

		return view('post.show', compact('post', 'category', 'comments'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $slug
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$post = Post::findOrFail($id);

		$categories = Category::select(['id', 'name'])->get();

		$tags = Tag::all();

		$idTagsOfPost = [];

		foreach ($post->tags as $tag) {
			$idTagsOfPost[] = $tag->id;
		}

		return view('post.edit', compact('post', 'categories', 'tags', 'idTagsOfPost'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$post = Post::findOrFail($id);

		$post->title = $request->get('title');
		$post->content = $request->get('content');
		$post->slug = preg_replace('/-\d+$/', '', $request->get('slug')) . "-{$post->id}";
		$post->category_id = $request->get('category');
		$post->is_draft = $request->get('is_draft');

		if ($request->hasFile('featured_image')){
			$oldImage = $post->featured_image;
			$post->featured_image = Helper::storeImage($request->file('featured_image'));
		}

		$post->update();

		$post->tags()->sync($request->get('tags'));

		if (!empty($oldImage)) 
			Storage::delete($oldImage);

		Session::flash('success', 'Bài viết đã được lưu lại');

		return redirect()->route('posts.show', [$post->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$post = Post::findOrFail($id);

		$post->tags()->detach();

		if (!empty($post->featured_image))
			Storage::delete($post->featured_image);

		$post->delete();

		Session::flash('success', "Đã xóa bài viết {$post->title}");

		return redirect()->route('posts.index');
	}
}
