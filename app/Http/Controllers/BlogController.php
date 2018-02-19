<?php

namespace App\Http\Controllers;

use App\Acme\Contract\CommentRepositoryInterface;
use App\Acme\Contract\PostRepositoryInterface;
use App\Acme\Repository\PostRepository;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller {
	private $postRepository;
	private $commentRepository;

	public function __construct(PostRepositoryInterface $postRepository, CommentRepositoryInterface $commentRepository) {
		$this->postRepository = $postRepository;
		$this->commentRepository = $commentRepository;
	}

	public function getIndex() {
//		$newestPosts = Post::where('is_draft', '0')->orderBy('created_at', 'desc')->paginate(10);
		$newestPosts = $this->postRepository->getPublishPosts();

		$tags = Tag::all();

		return view('home')->withPosts($newestPosts)->withTags($tags);
	}

	public function show($slug) {

		$post = Post::whereSlug($slug)->firstOrFail();

		if ($post->is_draft)
			return view('errors.404');

		$category = empty($post->category) ? "Không có": $post->category->name;

		$comments = $this->commentRepository->comments($post);

		$relatedPosts = $post->getRelatedPosts();

		return view('blog.show', compact('post', 'category', 'comments', 'relatedPosts'));
	}

	public function search(Request $request) {
		if (!$request->has('search'))
			return back();

		$name = $request->get('search');

		$posts = Post::findPosts($name);

		return view('blog.search_result', compact('posts', 'name'));
	}
}
