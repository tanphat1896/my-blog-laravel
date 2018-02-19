<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 1/23/18
 * Time: 11:30 PM
 */

namespace App\Acme\Repository;


use App\Acme\Contract\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface {
	public function comments($post) {
		$comments = $post->comments()->where([
			['approved', 1],
			['parent_id', null]
		])->orderBy('created_at', 'desc')->get();

		return $comments;
	}
}