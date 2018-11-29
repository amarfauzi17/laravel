<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;

class PagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $pages = Pages::orderBy('id', 'desc')->paginate(5);
        return view('admin.menu.pages.allpages')->withPages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.menu.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $pages = new Pages;
        $pages->title = $request->title;
        $pages->slug = str_slug($pages->title);
        $pages->content = $request->content;
        $pages->save();
        $pages = Pages::orderBy('id', 'desc')->paginate(5);
        return view('admin.menu.pages.allpages')->withInfo('Pages Berhasil')->withPages($pages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pages = Pages::find($id);
        return view('admin.menu.pages.edit')->withPages($pages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $pages = Pages::find($id);
        $pages->title = $request->title;
        $pages->content = $request->content;
        $pages->save();
        return back()->withInfo('Pages Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pages = Pages::find($id);
        $pages->delete();
        return back()->withInfo("Data Berhasil di Delete");
    }

}
