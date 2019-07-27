<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Page;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use View;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);

        View::composer("*",function($view){
            $nav_pages = Page::orderBy("title")->get();
            $nav_categories = Category::orderBy("name")->take(5)->get();
            $nav_tags = Tag::orderBy("name")->take(5)->get();
            $popularpost = Post::orderBy("visit_count","desc")->take(5)->get();
            $view->with([
                'nav_pages' => $nav_pages,
                'nav_tags'  => $nav_tags,
                'nav_categories' => $nav_categories,
                'popularpost'    => $popularpost,
            ]);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
