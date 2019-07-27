<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false]);
Route::group(["namespace" => 'frontend'],function(){
    // home
    Route::get('/', 'HomeController@index')->name('home.index');
    // post
    Route::get("/posts",'PostController@index')->name("post.index");
    Route::get("/post/{slug}",'PostController@show')->name("post.show");
    // Page
    Route::get("page/{slug}","PageController@show")->name("page.show");
    // category
    Route::get("category/{slug}","CategoryController@show")->name("category.show");
    // tag
    Route::get("tag/{slug}","TagController@show")->name("tag.show");// user
    Route::get('about', 'AuthorController@index')->name('author.index');
    Route::get("author/{id}","AuthorController@show")->name("author.show");
    // comment
    Route::post("comment","CommentController@store")->name("comment.store");
});