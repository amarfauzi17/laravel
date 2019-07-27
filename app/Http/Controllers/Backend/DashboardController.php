<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index() {
        $categories = Category::all();
        $tags 	    = Tag::all();
        $posts      = Post::orderBy('visit_count', 'desc')->get();
        $comments   = Comment::orderBy('id', 'desc')->get();
        return view('admin.menu.dasboard',compact('categories','tags','posts','comments'));
    }
}
