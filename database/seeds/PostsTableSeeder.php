<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Post::class, 20)->create()->each(function($item) {
    		$tag = Tag::inRandomOrder()->first();
    		$item->tags()->attach($tag->id);
    	});
    }
}
