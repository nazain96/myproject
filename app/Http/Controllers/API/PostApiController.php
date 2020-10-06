<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogpost;
use App\User;
use App\ApiKey;

class PostApiController extends Controller
{
    //
    public function jsonPost($api){
    	//validate api key

    	 $token = ApiKey::where('tokens', $api)->first();

            if($token == null){

                return "api key not found";

            }else{

                $post = Blogpost::all();

                return $post;
            }
    }

    public function store(Request $request, $api)
    {

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $token = ApiKey::where('tokens', $api)->first();
        // $auths = User::find($token->user_id);
        // $auths = User::firstOrFail()->where('api_token', $api);

        // $auths = DB::table('users')
        //              ->where('api_token', '=', $api)
        //              ->get();

        // $token = DB::table('api_keys')->where('tokens', $api)->get();

            if($token == null){
                return "api key not found";
            }else{
                $post = new Blogpost;
                $post->title = $request->title;
                $post->content = $request->content;
                $post->user_id = $token->user_id;//ganti dengan api key
                $post->save();

                return $post;
            }
            
        }
        else{
            return "Only Post method allowed";
        }
      
    }
}
