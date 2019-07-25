<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Post::class, 20)->create()->each(function($item) {
    		$tag = Tag::inRandomOrder()->first();
    		$item->tags()->attach($tag->id);
    	});
    }
}
