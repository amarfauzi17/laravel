<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Comment;
use App\pages;
use App\User;
use Illuminate\Support\Facades\DB;

class SinglePageController extends Controller {

    public function show($slug) { //Halaman Single Page Awal
        $menu = Category::orderBy('name', 'asc')->get();
        $tagsid = Tag::orderBy('name', 'asc')->get();
        $tags = Tag::paginate(5);
        $categories = Category::paginate(5);
        $popularpost = Post::orderBy('visit_count', 'desc')->paginate(5);
        $posts = Post::where('slug', '=', $slug)->first();
        $count = Post::where('slug', '=', $slug)->increment('visit_count');
        $author = DB::table('users')->select('*')
                        ->join('posts', 'posts.author_id', '=', 'users.id')
                        ->where('posts.slug', $slug)->first();
        $countcomment = DB::table('comments')->select('*')
                        ->join('posts', 'posts.id', '=', 'comments.post_id')
                        ->where('posts.slug', $slug)->count();
        $comment = DB::table('comments')->select('*')
                        ->join('posts', 'posts.id', '=', 'comments.post_id')
                        ->where('posts.slug', $slug)
                        ->orderBy('comments.id', 'desc')->get();
        $categoriessid = Category::orderBy('name', 'asc')->get();
        $pages = Pages::orderBy('title', 'asc')->get();
        return view('theme.singlepage')->withPosts($posts)->withTags($tags)->withCategories($categories)->withPages($pages)
                        ->withMenu($menu)->withTagsid($tagsid)->withCount($count)->withPopularpost($popularpost)
                        ->withAuthor($author)->withCountcomment($countcomment)->withComment($comment)->withCategoriessid($categoriessid);
    }

    public function showCategory($id) {
        $pages = Pages::orderBy('title', 'asc')->get();
        $menu = Category::orderBy('name', 'asc')->get();
        $tagsid = Tag::orderBy('name', 'asc')->get();
        $categories2 = Category::find($id);
        $posts = Post::where('category_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
        $popularpost = Post::orderBy('visit_count', 'desc')->paginate(5);
        $categoriessid = Category::orderBy('name', 'asc')->get();
        return view('theme.menucategory')->withTagsid($tagsid)->withPosts($posts)->withMenu($menu)->withPages($pages)
                        ->withCategories2($categories2)->withPopularpost($popularpost)->withCategoriessid($categoriessid);
    }

    public function showTags($id) {
        $pages = Pages::orderBy('title', 'asc')->get();
        $menu = Category::orderBy('name', 'asc')->get();
        $tagsid = Tag::orderBy('name', 'asc')->get();
        $tags = Tag::find($id);
        $posts = Post::select('*')
                        ->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
                        ->where('post_tag.tag_id', $id)
                        ->orderBy('posts.id', 'desc')->paginate(5);
        $popularpost = Post::orderBy('visit_count', 'desc')->paginate(5);
        $categoriessid = Category::orderBy('name', 'asc')->get();
        return view('theme.menutags')->withTagsid($tagsid)->withPosts($posts)->withMenu($menu)->withPages($pages)
                        ->withTags($tags)->withPopularpost($popularpost)->withCategoriessid($categoriessid);
    }

    public function about() {
        $pages = Pages::orderBy('title', 'asc')->get();
        $menu = Category::orderBy('name', 'asc')->get();
        $tagsid = Tag::orderBy('name', 'asc')->get();
        $popularpost = Post::orderBy('visit_count', 'desc')->paginate(5);
        $author = DB::table('users')->select('*')->orderBy('id', 'asc')->get();
        $categoriessid = Category::orderBy('name', 'asc')->get();
		//$imgauthor = User::all()->get();
        return view('theme.about')->withTagsid($tagsid)->withMenu($menu)->withPopularpost($popularpost)
                        ->withAuthor($author)->withCategoriessid($categoriessid)->withPages($pages);//->withImgauthor($imgauthor);
    }

    public function allpost() {
        $pages = Pages::orderBy('title', 'asc')->get();
        $menu = Category::orderBy('name', 'asc')->get();
        $tagsid = Tag::orderBy('name', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        $popularpost = Post::orderBy('visit_count', 'desc')->paginate(5);
        $categoriessid = Category::orderBy('name', 'asc')->get();
        return view('theme.postall')->withTagsid($tagsid)->withPosts($posts)->withMenu($menu)
                        ->withPopularpost($popularpost)->withCategoriessid($categoriessid)->withPages($pages);
    }

    public function showAuthor($id) {
        $pages = Pages::orderBy('title', 'asc')->get();
        $menu = Category::orderBy('name', 'asc')->get();
        $tagsid = Tag::orderBy('name', 'asc')->get();
        $author = DB::table('users')->find($id);
        $posts = DB::table('users')->select('*')
                        ->join('posts', 'posts.author_id', '=', 'users.id')
                        ->where('posts.author_id', $id)->orderBy('posts.id', 'desc')->paginate(5);
        $popularpost = Post::orderBy('visit_count', 'desc')->paginate(5);
        $categoriessid = Category::orderBy('name', 'asc')->get();
        return view('theme.showauthor')->withTagsid($tagsid)->withPosts($posts)->withMenu($menu)->withPages($pages)
                        ->withAuthor($author)->withPopularpost($popularpost)->withCategoriessid($categoriessid);
    }

    public function showPages($slug) {
        $pages = Pages::orderBy('title', 'asc')->get();
        $menu = Category::orderBy('name', 'asc')->get();
        $tagsid = Tag::orderBy('name', 'asc')->get();
        $tags = Tag::paginate(5);
        $categories = Category::paginate(5);
        $popularpost = Post::orderBy('visit_count', 'desc')->paginate(5);
        $pages1 = Pages::where('slug', '=', $slug)->first();
        $categoriessid = Category::orderBy('name', 'asc')->get();
        return view('theme.pages')->withTagsid($tagsid)->withPages1($pages1)->withPages($pages)->withTags($tags)->withCategories($categories)
                        ->withPopularpost($popularpost)->withCategoriessid($categoriessid)->withMenu($menu);
    }

}
