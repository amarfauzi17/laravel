<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use App\Comment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        $cat = Category::all()->count();
        $tag = Tag::all()->count();
        $sumusers = User::all()->count();
        $poparticle = Post::orderBy('visit_count', 'desc')->paginate(5);
        $comments = Comment::orderBy('id', 'desc')->paginate(5);
        $jmlcom = Comment::all()->count();
        $article = Post::all()->count();
        $viewer = DB::table('posts')->sum('visit_count');
        $hakakses = DB::table('users')->where('name','=','admin');
        return view('admin.menu.dasboard')->withPoparticle($poparticle)->withComments($comments)
                ->withJmlcom($jmlcom)->withViewer($viewer)->withArticle($article)->withSumusers($sumusers)
                ->withCat($cat)->withTag($tag)->withHakakses($hakakses);
    }
    
    public function hakAkses() {
        $hakakses = DB::table('users')->where('name','=','admin');
        return $hakakses;
    }
}
