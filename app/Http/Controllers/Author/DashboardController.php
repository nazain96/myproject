<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blogpost;
use App\Comment;
use App\User;

class DashboardController extends Controller
{ 
    //
    public function index(){

    		 $post = Blogpost::paginate(3);

     		return view('author.authdashboard', compact('post'));
    }

    public function mypost(){

        $user = User::find(Auth::id());
     // $userid = Auth::id();

     // $post = Blogpost::all()->where('user_id', $userid);

     return view('author.mypost', compact('user'));
    }

    public function create(){

    	return view('author.create');
    }

    public function store(Request $request){

    	$post = new Blogpost;

    	$post->title = $request->title;
    	$post->content = $request->content;
        $post->user_id = Auth::id();

    	$post->save();

    	return redirect(route('author.mypost'))->with('successMsg', 'Post Successfully Created');
    }

    public function edit($id){

    	$post = Blogpost::where('id',$id)->first();

        $user = Auth::id();

        if ($post->user_id == $user) {
            # code...
            return view('author.edit', compact('post'));
        }
        else{
            return redirect(route('author.mypost'))->with('successMsg', 'This post does not belong to you!!');
        }

    }

    public function update(Request $request, $id){

        $user = Auth::id();

    	$post = Blogpost::where('id',$id)->first();

        if($post->user_id == $user){

            $post->title = $request->title;
            $post->content = $request->content;

            $post->save();

            return redirect(route('author.mypost'))->with('successMsg', 'Post Successfully Updated');
        }
        else{
            return redirect(route('author.authdashboard'))->with('successMsg', 'This post does not belong to you!!');
        }
        //to do: add user checking

        // $user = User::find(Auth::id());

	    
    }

    public function deletePost($id){

    	Blogpost::where('id',$id)->first()->delete();

    	return redirect(route('author.mypost'))->with('successMsg', 'Post Successfully Deleted');
    }

    public function viewpost($id){

            $post = Blogpost::where('id',$id)->first();

            // $comm = Comment::where('post_id', $id)->get();

            return view('author.viewpost', compact('post'));
    }

    public function storeComments(Request $request){

        $comm = new Comment;

        $comm->comments = $request->comment;
        $comm->user_id = Auth::id();
        $comm->post_id = $request->post_id;

        $comm->save();

        return redirect(route('author.viewpost', $comm->post_id ))->with('successMsg', 'Your comments have been posted!');
    }

    // public function comments($id){

    //         $comm = Comments::where('post_id',$id)->first();

    //         return view('admin.viewpost', compact('comm'));
    // }
}
