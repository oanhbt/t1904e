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

//admin
/*Route::get('/cate_management', function() {
    return view('category.list');
});
Route::get('/cate_management', 'CategoryController@index');*/

Route::resource('/cate_management', 'CategoryController');


/*Route::get('/tags_management', function() {
    return view('tags.tags');
});
Route::get('tags_management', 'TagsController@index');*/

Route::resource('/tags_management', 'TagsController');
Route::resource('/post_management', 'PostController');
