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

// Homepage Route
Route::get('/', 'App\Http\Controllers\HomePageController@index');

Route::resource('/products', 'App\Http\Controllers\ProductController');

//Route::get('/', function () {
//    return view('welcome');
//});
