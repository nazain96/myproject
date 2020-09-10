<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blogpost;

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

     $userid = Auth::id();

     $post = Blogpost::all()->where('user_id', $userid);

     return view('mypost', compact('post'));
    }

    public function create(){

    	return view('create');
    }

    public function store(Request $request){

    	$post = new Blogpost;

    	$post->p_title = $request->title;
    	$post->p_content = $request->content;
        $post->user_id = Auth::id();

    	$post->save();

    	return redirect(route('mypost'))->with('successMsg', 'Post Successfully Created');
    }

    public function edit($id){

    	$post = Blogpost::where('p_id',$id)->first();

    	return view('edit', compact('post'));

    }

    public function update(Request $request, $id){

    	$post = Blogpost::where('p_id',$id)->first();

	    $post->p_title = $request->title;
    	$post->p_content = $request->content;

    	$post->save();

    	return redirect(route('mypost'))->with('successMsg', 'Post Successfully Updated');
    }

    public function delete($id){

    	Blogpost::where('p_id', $id)->first()->delete();

    	return redirect(route('mypost'))->with('successMsg', 'Post Successfully Deleted');
    }
}
