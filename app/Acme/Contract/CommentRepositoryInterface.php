<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 1/23/18
 * Time: 11:30 PM
 */

namespace App\Acme\Contract;


interface CommentRepositoryInterface {
	public function comments($post);
}