<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blogpost;
use App\User;
use App\Comment;
use App\ApiKey;
use Ramsey\Uuid\Uuid;

class DashboardController extends Controller
{
    //
    public function index(){

    		$post = Blogpost::paginate(5);

     		return view('admin.homedash', compact('post'));
    }

    public function mypost(){

        $user = User::find(Auth::id());

        return view('admin.mypost', compact('user'));
    }

    public function create(){

    	return view('admin.create');
    }

    public function store(Request $request){

    	$post = new Blogpost;

    	$post->title = $request->title;
    	$post->content = $request->content;
        $post->user_id = Auth::id();

    	$post->save();

    	return redirect(route('admin.mypost'))->with('successMsg', 'Post Successfully Created');
    }

    public function edit($id){

    	$post = Blogpost::where('id',$id)->first();

    	return view('admin.edit', compact('post'));

    }

    public function update(Request $request, $id){

        // $user = Auth::id();

    	$post = Blogpost::where('id',$id)->first();

        if($post->user_id == Auth::id()){

            $post->title = $request->title;
            $post->content = $request->content;

            $post->save();

            return redirect(route('admin.mypost'))->with('successMsg', 'Post Successfully Updated');
        }
        else{
            return redirect(route('admin.homedash'))->with('successMsg', 'This post does not belong to you!!');
        }
        //to do: add user checking

        // $user = User::find(Auth::id());
	    
    }

    public function deletePost($id){

        Blogpost::where('id',$id)->first()->delete();

        return redirect(route('admin.homedash'))->with('successMsg', 'Post Successfully Deleted');
    }

    public function deleteUser($id){

    	User::where('id',$id)->first()->delete();

    	return redirect(route('admin.userslist'))->with('successMsg', 'User has been removed!');
    }

    public function userslist(){

    		$user = User::all();

            $key = ApiKey::all();

     		return view('admin.userslist', compact('user', 'key'));
    }

    public function viewpost($id){

            $post = Blogpost::where('id',$id)->first();

            return view('admin.viewpost', compact('post'));
    }

    public function storeComments(Request $request){

        $comm = new Comment;

        $comm->comments = $request->comment;
        $comm->user_id = Auth::id();
        $comm->post_id = $request->post_id;

        $comm->save();

        return redirect(route('admin.viewpost', $comm->post_id))->with('successMsg', 'Your comments have been posted!');
    }

    // public function comments($id){

    //         $comm = Comments::where('post_id',$id)->first();

    //         return view('admin.viewpost', compact('comm'));
    // }

    public function block(Request $request, $id){

        $user = User::where('id',$id)->first();

        $user->banned_until = $request->block_date;

        $user->save();

        return redirect(route('admin.userslist'))->with('successMsg', 'Your have block a user from logging in.');

    }

    public function unblock(Request $request, $id){

        $user = User::where('id',$id)->first();

        $user->banned_until = $request->date;

        $user->save();

        return redirect(route('admin.userslist'))->with('successMsg', 'Your have  successfully unblock a user.');

    }

    public function generateApi(Request $request, $id){

        $key = ApiKey::where('user_id', $id)->first();

        if($key != null){

            $newkey = Uuid::uuid4();

            $key->tokens = $newkey;

            return redirect(route('admin.userslist'))->with('successMsg', 'New Api Key Successfully Generated');

        }
        else{

            $key = new ApiKey;

            $key->user_id = $request->userid;

            $key->tokens = Uuid::uuid4();

            $key->save();

            return redirect(route('admin.userslist'))->with('successMsg', 'Api Key Successfully Generated');
        }

    }
}
