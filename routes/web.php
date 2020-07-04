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

// Route::get('image','ImageController@index');

Route::get('upload-image','ImageController@index');
Route::post('image-save','ImageController@store')->name('image-save');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
