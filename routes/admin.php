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

Route::group(["middleware" => ["auth"], "namespace" => "Backend", "as" => "admin.", "prefix" => "/dashboard"],function(){
	Route::get('/', 'DashboardController@index')->name('dashboard.index');
	Route::resource("category","CategoryController")->except("index","show","edit");
	Route::resource("comment","CommentController")->only("index","destroy");
	Route::resource("page","PageController")->except("show");
	Route::resource("post","PostController")->except("show");
	Route::resource("tag","TagController")->except("index","show","edit");
  // user
  Route::patch("user-change-foto/{id}","UserController@changeFoto")->name("user.change.foto");
  Route::post("user-change-password","UserController@changePassword")->name("user.change.password");
  Route::get("user-change-password","UserController@showPassword")->name("user.show.password");
	Route::resource("user","UserController");
  Route::resource("admin","AdminController")->except("show","edit","update");
  Route::patch("admin-reset-password","AdminController@resetPassword")->middleware("adminrole")->name("admin.reset.password");
});