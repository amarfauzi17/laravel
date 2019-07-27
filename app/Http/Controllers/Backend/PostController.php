<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("id","desc")->paginate(10);
        return view("admin.menu.post.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("name")->get();
        $tags = Tag::orderBy("name")->get();
        return view("admin.menu.post.create",compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payloads = $request->except("_token");
        $payloads['slug'] = str_slug($request->title);
        $payloads['author_id'] = Auth::user()->id;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = str_slug($request->title)."-".time() . "." . $file->getClientOriginalExtension();
            $destinationpath = public_path('images');
            $file->move($destinationpath, $filename);
            $payloads['image'] = $filename;
        }
        $post = Post::create($payloads);
        $post->tags()->sync($request->tags);
        return redirect()->route("admin.post.index")->withInfo("post sukses di buat");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy("name")->get();
        $tags = Tag::orderBy("name")->get();
        $post = Post::find($id);
        return view("admin.menu.post.edit",compact('categories','tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $payloads = $request->except("_token","_method");
        $payloads['slug'] = str_slug($request->title);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = str_slug($request->title)."-".time() . "." . $file->getClientOriginalExtension();
            $destinationpath = public_path('images');
            $file->move($destinationpath, $filename);

            if(\File::exists(public_path('images/'.$post->image))){
                \File::delete(public_path('images/'.$post->image));
            }

            $payloads['image'] = $filename;
        }
        $post->update($payloads);
        $post->tags()->sync($request->tags);
        return redirect()->route("admin.post.index")->withInfo("post sukses di edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(\File::exists(public_path('images/'.$post->image))){
            \File::delete(public_path('images/'.$post->image));
        }
        $post->delete();
        return redirect()->route("admin.post.index")->withDanger("post sukses di hapus");
    }
}
