<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Post');
        
        for($i = 1 ; $i <= 30 ; $i++){

        	$title = $faker->sentence;
			$slug = CodeHelper::slug($title);

        	DB::table('Post')->insert([
				'category_id'      => 2,
				'post_name'        => $title,
				'post_slug'        => $slug,
				'post_description' => $faker->paragraph(),
				'post_image'       => "a",
				'created_at'       => \Carbon\Carbon::now(),
				'Updated_at'       => \Carbon\Carbon::now(),
       		]);
       	}
    }
}
