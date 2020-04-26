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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// admin
//Route::get('/cate_management','CategoryController@index');
Route::resource('/cate_management','CategoryController');
//Route::get('/cate_management','CategoryController@index');
//Route::get('/cate_management','CategoryController@create');
//Route::post('/cate_management','CategoryController@store');
//Route::get('/cate_management','CategoryController@show');
//Route::get('/cate_management','CategoryController@edit');
//Route::put('/cate_management','CategoryController@update');
//Route::delete('/cate_management','CategoryController@destroy');


