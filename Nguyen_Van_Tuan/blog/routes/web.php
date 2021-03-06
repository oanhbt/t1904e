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

Route::get('/', 'FrontendController@welcom');
Route::get('/category.html/{id?}', 'FrontendController@category');
Route::get('/single.html/{id}', 'FrontendController@single');
Route::post('post_comment', 'FrontendController@post_comment');
Route::post('subscribe', 'FrontendController@subscribe');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin
Route::get('/cate_management', function() {
  return view('category.list');
});

Route::get('/post_management', function() {
  return view('post.list');
});

// Route::get('/cate_management', 'CategoryController@index');
  // Route::resource('/cate_management', 'CategoryController')->middleware('auth');
// C1
Route::group(['middleware' => 'auth'], function(){
  Route::resource('/cate_management', 'CategoryController');
  Route::resource('/post_management', 'PostController');
  Route::post('/post_management/change/{id}', 'PostController@change')->name('post_management.change');
  Route::post('/post_management/changeStatus', 'PostController@change_api');
});

// C2 Thủ công
// Route::get('/cate_management', 'CategoryController@index')->name('cate_management.index');
// Route::get('/cate_management/create', 'CategoryController@create')->name('cate_management.create');
// Route::post('/cate_management', 'CategoryController@store')->name('cate_management.store');
// Route::get('/cate_management/1', 'CategoryController@show')->name('cate_management.show');
// Route::get('/cate_management/1/edit', 'CategoryController@edit')->name('cate_management.edit');
// Route::put('/cate_management/1', 'CategoryController@update')->name('cate_management.update');
// Route::delete('/cate_management/1', 'CategoryController@destroy')->name('cate_management.destroy');
