<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Blogpost;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('homedash', function (Request $request) {
    return $request->user();
});

Route::any('view/{api}', 'API\PostApiController@jsonPost');

Route::any('insert/{api}', 'API\PostApiController@jsonPost');

Route::any('example', 'API\ExamplePostApiController@index');
Route::post('example1/{api}', 'API\ExamplePostApiController@store');
Route::delete('delete/{id}/{api}', 'API\ExamplePostApiController@destroy');
Route::any('update/{id}/{api}', 'API\ExamplePostApiController@update');

