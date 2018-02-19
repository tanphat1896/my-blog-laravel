<?php

namespace App\Providers;

use App\Acme\Contract\CommentRepositoryInterface;
use App\Acme\Contract\MenuRepositoryInterface;
use App\Acme\Contract\PostRepositoryInterface;
use App\Acme\Repository\CommentRepository;
use App\Acme\Repository\EloquentMenuRepository;
use App\Acme\Repository\PostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	public function __construct(\Illuminate\Contracts\Foundation\Application $app) {
		parent::__construct($app);
	}

	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(MenuRepositoryInterface::class, EloquentMenuRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }
}
