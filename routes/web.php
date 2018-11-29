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

Route::get('/', function () {
    $categories = App\Category::orderBy('id', 'desc')->paginate(5);
    $tags = App\Tag::orderBy('id', 'desc')->paginate(5);
    $posts = App\Post::orderBy('id', 'desc')->paginate(6);
    $menu = App\Category::orderBy('name', 'asc')->get();
    $pages = App\Pages::orderBy('title', 'asc')->get();
    $tagsid = App\Tag::orderBy('name', 'asc')->get();
    $categoriessid = App\Category::orderBy('name', 'asc')->get();
    $lastpost = App\Post::orderBy('created_at', 'desc')->paginate(3);
    $popularpost = App\Post::orderBy('visit_count', 'desc')->paginate(5);
    return view('index')->withPosts($posts)->withTags($tags)->withCategories($categories)->withCategoriessid($categoriessid)
                    ->withPages($pages)->withMenu($menu)->withTagsid($tagsid)->withLastpost($lastpost)->withPopularpost($popularpost);
});

Auth::routes();

Route::get('/dasboard', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
Route::resource('category', 'CategoryController');
Route::resource('tags', 'TagController');
Route::resource('comments', 'CommentsController');
Route::resource('pages', 'PagesController');
Route::resource('users', 'UserController');

Route::get('post/{slug}', 'SinglePageController@show')->name('singlepage.show');
Route::get('kategori/{id}', 'SinglePageController@showCategory')->name('menucategory.show');
Route::get('tag/{id}', 'SinglePageController@showTags')->name('menutags.show');

Route::get('about', 'SinglePageController@about')->name('about.show');
Route::get('allpost', 'SinglePageController@allpost')->name('allpost.show');
Route::get('page/{slug}', 'SinglePageController@showPages')->name('page.show');
Route::get('author/{id}', 'SinglePageController@showAuthor')->name('authorpost.show');
Route::patch('changefoto/{id}', 'UserController@updatefoto')->name('foto.update');

Route::get('/alluser', 'UserController@showAll')->name('user.showall');
Route::get('/changePassword', 'UserController@showpass')->name('pass.show');
Route::post('/changePassword', 'UserController@changePassword')->name('changePassword');

Route::patch('alluser/{id}', 'UserController@resetPassUser')->name('resetPassUser');
Route::patch('changelevel/{id}', 'UserController@changeAkses')->name('changeAkses');
Route::get('query', 'CariController@search');