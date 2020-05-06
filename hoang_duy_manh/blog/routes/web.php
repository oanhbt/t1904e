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
/*Route::get('/cate_management', function() {
  return view('category.list');
});*/
//Route::get('/cate_management', 'CategoryController@index');
Route::resource('/cate_management', 'CategoryController');
Route::resource('/post_management', 'PostController');
Route::resource('/apartment_info','ApartmentController');

/*
Route::get('/cate_management', 'CategoryController@index')->name('cate_management.index');
Route::get('/cate_management/create', 'CategoryController@create')->name('cate_management.create');
Route::post('/cate_management', 'CategoryController@store')->name('cate_management.store');
Route::get('/cate_management/{id}', 'CategoryController@show')->name('cate_management.store');;
Route::get('/cate_management/{id}/edit', 'CategoryController@edit')->name('cate_management.edit');
Route::put('/cate_management/{id}', 'CategoryController@update')->name('cate_management.update');;
Route::delete('/cate_management/{id}', 'CategoryController@destroy')->name('cate_management.destroy');;
*/
