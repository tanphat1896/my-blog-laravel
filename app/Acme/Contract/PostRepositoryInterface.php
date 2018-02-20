<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 1/13/18
 * Time: 12:57 AM
 */

namespace App\Acme\Contract;


use App\Post;

interface PostRepositoryInterface {
	public function find($id);

	public function findBySlug($slug);

	public function getPosts($perPage);

	public function getPublishPosts($perPage);

	public function incrementView(Post $post);

}