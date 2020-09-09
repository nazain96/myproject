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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/houston', function () {
    return view('houston');
});

// Route::get('/home', function () {
//     return view('homepage');
// });

// Route::get('/test', function () {
//     return "This is jus a test";
// });

// Route::get('/houston', 'BlogController@welcome' )->name('houston');

Route::get('/homepage', 'BlogController@home' )->name('home');

Route::get('/create', 'BlogController@create' )->name('create');

Route::post('/create', 'BlogController@store' )->name('store');

Route::get('/edit/{id}', 'BlogController@edit' )->name('edit');

Route::post('/update/{id}', 'BlogController@update' )->name('update');

Route::delete('/delete/{id}', 'BlogController@delete' )->name('delete');

Auth::routes();

Route::get('/home', 'BlogController@index')->name('home');

// Route::get('/home', 'HomeController@index')->name('home');
