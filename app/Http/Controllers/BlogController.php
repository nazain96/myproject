<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogpost;

class BlogController extends Controller
{
    //

    // public function welcome(){

    //     return view('houston');
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){

     $post = Blogpost::paginate(5);

     return view('homepage', compact('post'));
    }

    // public function index(){

    // 	$post = Blogpost::paginate(5);

    // 	return view('homepage', compact('post'));
    // }

    public function index(){

     $post = Blogpost::paginate(5);

     return view('home', compact('post'));
    }

    public function create(){

    	return view('create');
    }

    public function store(Request $request){

    	$post = new Blogpost;

    	$post->p_title = $request->title;
    	$post->p_content = $request->content;

    	$post->save();

    	return redirect(route('home'))->with('successMsg', 'Post Successfully Created');
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

    	return redirect(route('home'))->with('successMsg', 'Post Successfully Updated');
    }

    public function delete($id){

    	Blogpost::where('p_id', $id)->first()->delete();

    	return redirect(route('home'))->with('successMsg', 'Post Successfully Deleted');
    }
}
