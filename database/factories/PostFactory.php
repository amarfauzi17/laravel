<?php

use Faker\Generator as Faker;
use App\Models\Category;
use App\Models\User;

$factory->define(App\Models\Post::class, function (Faker $faker) {
	$category = Category::inRandomOrder()->first();
	$user = User::inRandomOrder()->first();
	$images = rand(10,12).".jpg";

	$title = $faker->unique()->sentence;
	return [
		'title'             	=> $title,
		'slug'              	=> str_slug($title),
		'image'					=> $images,
		'content'           	=> $faker->text,
		'category_id' 			=> $category->id,
		'visit_count'			=> 0,
		'author_id' 			=> $user->id,
	];
});
