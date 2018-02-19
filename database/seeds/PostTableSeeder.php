<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{

	function toSlug($str) {
		$str = trim(mb_strtolower($str));
		$str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
		$str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
		$str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
		$str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
		$str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
		$str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
		$str = preg_replace('/(đ)/', 'd', $str);
		$str = preg_replace('/[^a-z0-9-\s]/', '', $str);
		$str = preg_replace('/([\s]+)/', '-', $str);
		return $str;
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categories')->insert([
    		'name' => 'Chưa phân loại',
			'slug' => 'uncategory'
		]);
    	$faker = Faker\Factory::create('vi_VN');
    	$posts = [];
    	for ($i = 0; $i <= 100; $i++) {
    		$title = $faker->sentence;
    		$posts[] = [
				'title' => $title,
				'content' => $faker->paragraph . ". " . $faker->paragraph,
				'slug' => $this->toSlug($title),
				'is_draft' => $i%2,
				'category_id' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
		}
        DB::table('posts')->insert($posts);
    }


}
