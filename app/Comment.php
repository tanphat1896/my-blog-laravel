<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	public function post() {
		return $this->belongsTo(Post::class);
	}

	public function changeApproved($approved) {
		$this->approved = $approved;

		$this->save();
	}
	public function changeContent($newContent) {
		$this->content = $newContent;

		$this->save();
	}

	public function children() {
		return $this->hasMany(Comment::class, 'parent_id', 'id');
	}

	public function hasChild() {
		return self::where('parent_id', $this->id)->count() > 0;
	}

	public function children_() {
		return self::where('parent_id', $this->id)->get();
	}
}
