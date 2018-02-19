<?php

namespace App;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = [
		'title', 'content', 'slug'
	];

	public function __construct(array $attributes = []) {
		parent::__construct($attributes);
	}

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function tags(){
		return $this->belongsToMany(Tag::class);
	}

	public function comments() {
		return $this->hasMany(Comment::class);
	}

	public function getRelatedPosts() {
		$relatedPosts = Post::select('title', 'slug', 'featured_image')->where([
			['is_draft', 0],
			['category_id', $this->category_id],
			['id', '<>', $this->id]
			])->orderBy('created_at')->limit(5)->get();

		return $relatedPosts;
	}

	public static function findPosts($name) {
		$slug = Helper::getSlug($name);

		$posts = Post::select('title', 'slug', 'featured_image', 'created_at', 'content')
			->where([
				['title', 'like', "%$name%"],
				['slug', 'like', "%$slug%"]
			])->orderBy('created_at')->get();

		return $posts;
	}
}
