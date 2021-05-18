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

Route::get('/', 'App\Http\Controllers\ImageController@create')->name('get.image');
Route::post('/', 'App\Http\Controllers\ImageController@store')->name('post.image');
Route::get('/image', 'App\Http\Controllers\ImageController@show')->name('show.image');