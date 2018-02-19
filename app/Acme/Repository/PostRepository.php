<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 1/13/18
 * Time: 1:29 AM
 */

namespace App\Acme\Repository;


use App\Acme\Contract\PostRepositoryInterface;
use App\Post;

class PostRepository implements PostRepositoryInterface {

	public function find($id) {
		$post = Post::find($id);

		return $post;
	}

	public function findBySlug($slug) {
		$post = Post::whereSlug($slug)->firstOrFail();

		return $post;
	}

	public function getPosts($perPage = 15) {
		$posts = Post::paginate($perPage);

		return $posts;
	}


	public function getPublishPosts($perPage = 15) {
		$posts = Post::where('is_draft', 0)->orderBy('created_at', 'desc')->paginate($perPage);

		return $posts;
	}

}