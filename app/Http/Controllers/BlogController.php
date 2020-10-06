<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blogpost;
use App\User;


class BlogController extends Controller
{
    //

    // public function welcome(){

    //     return view('houston');
    // }

    // public function home(){

    //  $post = Blogpost::paginate(5);

    //  return view('homepage', compact('post'));
    // }

    // public function index(){

    //  $post = Blogpost::paginate(5);

    //  return view('homepage', compact('post'));
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

     $post = Blogpost::paginate(5);

     return view('home', compact('post'));
    }

    public function mypost(){

        $user = User::find(Auth::id());
     // $userid = Auth::id();

     // $post = Blogpost::all()->where('user_id', $userid);

     return view('mypost', compact('user'));
    }

    public function create(){

    	return view('create');
    }

    public function store(Request $request){

    	$post = new Blogpost;

    	$post->title = $request->title;
    	$post->content = $request->content;
        $post->user_id = Auth::id();

    	$post->save();

    	return redirect(route('mypost'))->with('successMsg', 'Post Successfully Created');
    }

    public function edit($id){

    	$post = Blogpost::where('id',$id)->first();

    	return view('edit', compact('post'));

    }

    public function update(Request $request, $id){

        $user = Auth::id();

    	$post = Blogpost::where('id',$id)->first();

        if($post->user_id == $user){

            $post->title = $request->title;
            $post->content = $request->content;

            $post->save();

            return redirect(route('mypost'))->with('successMsg', 'Post Successfully Updated');
        }
        else{
            return redirect(route('home'))->with('successMsg', 'This post does not belong to you!!');
        }
        //to do: add user checking

        // $user = User::find(Auth::id());
    }

    public function delete($id){

    	Blogpost::where('id',$id)->first()->delete();

    	return redirect(route('mypost'))->with('successMsg', 'Post Successfully Deleted');
    }



    public function index1()
    {
        return Blogpost::all();
    }
 
    public function show1($id)
    {
        return Blogpost::find($id);
    }

    public function store1(Request $request)
    {
        return Blogpost::create($request->all());
    }

    public function update1(Request $request, $id)
    {
        $post = Blogpost::findOrFail($id);
        $post->update($request->all());

        return $article;
    }

    public function delete1(Request $request, $id)
    {
        $post = Blogpost::findOrFail($id);
        $post->delete();

        return 204;
    }
}
