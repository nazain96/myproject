<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogpost;
use App\User;
use App\ApiKey;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;



class ExamplePostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $token = ApiKey::paginate(5);
         return $token;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                $cuba = Uuid::uuid4();


                return $post;
            }
            
        }
        else{
            return "Only Post method allowed";
        }
      
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $api)
    {
        //
        $post = Blogpost::where('id',$id)->first();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 

            $token = ApiKey::where('tokens', $api)->first(); 


            if($post->user_id == $token->user_id){
                $post->title = $request->title;
                $post->content = $request->content;

                // $post->save();

                if($request->title == null || $request->content == null){

                    return "The 'title' or 'content' field cannot be null";
                }
                else{

                    $post->save();

                    return $post;

                }

                
            }
            else{
                return "This post does not belong to you!";
            }
        }
        else{
            return "Only Delete method allowed";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $api)
    {
        //
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){    
        
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

                Blogpost::where('id',$id)->first()->delete();
                
                $cuba = Uuid::uuid4();

                return $token->user_id;//"Post Successfully Deleted";
            }
            
        }
        else{
            return "Only Delete method allowed";
        }
    }
}
