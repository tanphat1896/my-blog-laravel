<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 1/21/18
 * Time: 6:38 PM
 */

namespace App\Acme\Contract;


interface MenuRepositoryInterface {

	public function getMenus() ;

	public function save($data);

	public function update($id, $data);

	public function delete($id);
}