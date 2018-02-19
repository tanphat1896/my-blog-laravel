<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 1/21/18
 * Time: 6:39 PM
 */

namespace App\Acme\Repository;


use App\Acme\Contract\MenuRepositoryInterface;
use App\Helper\Helper;
use App\Menu;

class EloquentMenuRepository implements MenuRepositoryInterface {

	public function getMenus() {
		$menus = Menu::with('children')
			->whereNull('parent_id')
			->orderBy('sequence')
			->get();
		return $menus;
	}

	public function save($data) {
		$menu = new Menu;

		$menu->name = $data['name'];
		$menu->link = $data['link'];
		$menu->slug = Helper::getSlug($menu->name);
		$menu->sequence = $data['sequence'] ?: Menu::all()->count() + 1;
		$menu->parent_id = $data['parent_id'] ?: null;

		$menu->save();

		return true;
	}

	public function update($id, $data) {
		// TODO: Implement update() method.
	}

	public function delete($id) {
		$menu = Menu::findOrFail($id);

		$menu->delete();
	}
}