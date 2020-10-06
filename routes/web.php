<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/bis', function () {
//     return view('bisland');
// });

// Route::get('/boot', function () {
//     return view('bootstrap');
// });


// Route::get('/home', function () {
//     return view('homepage');
// });

// Route::get('/test', function () {
//     return "This is jus a test";
// });

// Route::get('/houston', 'BlogController@welcome' )->name('houston');

// Route::get('/homepage', 'BlogController@home' )->name('home');

// Route::get('/create', 'BlogController@create' )->name('create');

// Route::post('/create', 'BlogController@store' )->name('store');

// Route::get('/edit/{id}', 'BlogController@edit' )->name('edit');

// Route::post('/update/{id}', 'BlogController@update' )->name('update');

// Route::delete('/delete/{id}', 'BlogController@delete' )->name('delete');

// Route::get('/mypost', 'BlogController@mypost' )->name('mypost');

// Route::get('/home', 'BlogController@index')->name('home');

// Route::get('/callpost', 'Callpost@list')->name('list');



Route::group([ 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],

	function(){ 

		Route::get('homedash', 'DashboardController@index')->name('homedash');

		Route::delete('homedash/{id}', 'DashboardController@deletePost' )->name('deletePost');

		Route::get('mypost', 'DashboardController@mypost')->name('mypost');

		Route::get('userslist', 'DashboardController@userslist')->name('userslist');
		
		Route::get('create', 'DashboardController@create' )->name('create');
		
		Route::post('create', 'DashboardController@store' )->name('store');
		
		Route::get('edit/{id}', 'DashboardController@edit' )->name('edit');
		
		Route::post('update/{id}', 'DashboardController@update' )->name('update');
		
		Route::delete('userslist/{id}', 'DashboardController@deleteUser' )->name('deleteUser');

		Route::get('viewpost/{id}', 'DashboardController@viewpost' )->name('viewpost');

		Route::post('viewpost', 'DashboardController@storeComments' )->name('storeComments');

		Route::post('block/{id}', 'DashboardController@block' )->name('block');	

		Route::post('unblock/{id}', 'DashboardController@unblock' )->name('unblock');

		Route::post('generateApi/{id}', 'DashboardController@generateApi' )->name('generateApi');	


	
	}
);



Route::group([ 'as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author'] ],

	function(){

		Route::get('authdashboard', 'DashboardController@index')->name('authdashboard');

		Route::get('mypost', 'DashboardController@mypost')->name('mypost');

		Route::get('create', 'DashboardController@create' )->name('create');
		
		Route::post('create', 'DashboardController@store' )->name('store');
		
		Route::get('edit/{id}', 'DashboardController@edit' )->name('edit');
		
		Route::post('update/{id}', 'DashboardController@update' )->name('update');
		
		Route::delete('delete/{id}', 'DashboardController@delete' )->name('delete');

		Route::get('viewpost/{id}', 'DashboardController@viewpost' )->name('viewpost');

		Route::post('viewpost', 'DashboardController@storeComments' )->name('storeComments');
	
	}

);

