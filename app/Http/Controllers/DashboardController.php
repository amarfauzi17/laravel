<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function showPopArticle(){
        $view = DB::table('posts')->sum('visit_count');
        return view('admin.menu.dasboard');
    }
}
