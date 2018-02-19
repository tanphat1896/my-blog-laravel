<?php
/**
 * Created by PhpStorm.
 * User: TanPhat
 * Date: 12/26/2017
 * Time: 1:50 PM
 */

namespace App\Helper;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class Helper {

	public static function storeImage(UploadedFile $file) {
		$location = public_path("image/uploaded");

		$fileName = time() . "." . $file->extension();

		Image::make($file)->save("$location/$fileName", 100);

		return $fileName;
	}


	/**
	 * Lấy slug từ một câu tiếng việt
	 * @param string $str
	 * @param string $append
	 * @return string
	 */
	public static function getSlug($str = '', $append = '') {
		$str = trim(mb_strtolower($str));

		$str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
		$str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
		$str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
		$str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
		$str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
		$str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
		$str = preg_replace('/(đ)/', 'd', $str);
		$str = preg_replace('/[^a-z0-9-+\s]/', '', $str);
		$str = preg_replace('/([\s]+)/', '-', $str);

		if (!empty($append))
			$str .= "-$append";
		
		return $str;
	}
}