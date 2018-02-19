<?php

namespace App\Http\Middleware;

use App\Acme\Contract\MenuRepositoryInterface;
use Closure;
use Illuminate\View\View;

class GetMenu
{

	public function __construct(MenuRepositoryInterface $menuRepository) {
		$this->menuRepository = $menuRepository;
	}

	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$menus = $this->menuRepository->getMenus();
//    	session()->flash('menus', $menus);
		view()->share('menus', $menus);
        return $next($request);
    }
}
