<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller {

	public function __construct() {
		$this->middleware('level', ['only' => ['update', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
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
			'name' => 'required|min:3',
			'email' => 'required|email',
			'comment' => 'required|min:3',
			'post_id' => 'integer'
		]);

		$post = Post::findOrFail($request->get('post_id'));

		$comment = new Comment();
		$comment->name = $request->get('name');
		$comment->email = $request->get('email');
		$comment->content = $request->get('comment');
		$comment->approved = false;

		$comment->post()->associate($post);

		$comment->save();

		return back();
	}

	public function storeReply(Request $request) {
		$this->validate($request, [
			'comment' => 'required|min:3',
			'parent_id' => 'required|numeric'
		]);

		$parent = Comment::findOrFail($request->get('parent_id'));

		$comment = new Comment;

		$comment->name = Auth::user()->name;
		$comment->email = Auth::user()->email;
		$comment->content = $request->get('comment');
		$comment->approved = true;
		$comment->parent_id = $parent->id;
		$comment->post_id = $parent->post_id;

		$comment->save();

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$comment = Comment::findOrFail($id);

		if ($request->has('approved'))
			$comment->changeApproved($request->get('approved'));

		if ($request->has('comment'))
			$comment->changeContent($request->get('comment'));

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$comment = Comment::findOrFail($id);

		$comment->delete();

		return back();
	}
}
