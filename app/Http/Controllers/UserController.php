<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use Auth;
use Hash;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.menu.userprofile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.menu.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'umur' => 'required|numeric|digits_between:1,3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'cpassword' => 'same:password'
        ]);

        $users = new User;
        $users->name = $request->name;
        $users->lokasi = $request->lokasi;
        $users->umur = $request->umur;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->foto = 'profile-pic.jpg';
        $users->level = 'author';
        $users->save();
        return back()->withInfo('Input User Succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = Auth::user();
        $users = User::find($id);
        $view = DB::table('posts')->where('author_id', '=', $user->id)->sum('visit_count');
        $article = DB::table('posts')->where('author_id', '=', $user->id)->count();
        return view('admin.menu.userprofile')->withUsers($users)->withView($view)->withArticle($article);
    }

    public function showpass() {
        // $users = User::find($id);
        return view('admin.menu.changepass'); //->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
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
            'name' => 'required',
            'location' => 'required',
            'age' => 'required|numeric|digits_between:1,3',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->lokasi = $request->location;
        $user->umur = $request->age;
        $user->email = $request->email;

        $user->save();
        return back()->withInfo('Berhasil di Edit');
    }

    public function updatefoto(Request $request, $id) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $destinationpath = public_path('images');
            $file->move($destinationpath, $filename);
            $user->foto = $filename;
        }
        $user->save();
        return back()->withInfo('Berhasil di Edit');
    }

    public function changePassword(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success", "Password changed successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $users = User::find($id);
        $users->delete();
        return back()->withInfo("Data Berhasil di Delete");
    }

    public function showAll() {
        $users = User::whereNotIn('id', [1])->paginate(5);
        return view('admin.menu.users.alluser')->withUsers($users);
    }

    public function resetPassUser(Request $request, $id) {
        $request->validate([
            'password' => 'required',
            'cpassword' => 'same:password'
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->password);

        $user->save();
        return back()->withInfo('Password Berhasil di Reset');
    }

    public function changeAkses(Request $request, $id) {
        $request->validate([
            'level_id' => 'required'
        ]);
        $user = User::find($id);
        $user->level = $request->level_id;
        $user->save();
        return back()->withInfo('Berhasil di ganti');
    }

}
