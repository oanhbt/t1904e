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

Route::get('/', 'FrontendController@welcome');

Route::get('/single.html/{id}', 'FrontendController@single');

Route::post('post_comment', 'FrontendController@post_comment');

Route::get('/category.html/{id?}', 'FrontendController@category');

Route::post('subscribe','FrontendController@subscribe');

Route::get('/survey.html/{id?}', 'FrontendController@category');
Route::post('post_survey', 'FrontendController@post_survey');

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

Route::group(['middleware' => 'auth'], function() { //sử dụng để sau khi logout, truy cập lại trang vừa r thì sẽ vào phần login
Route::resource('/tags_management', 'TagsController');
Route::resource('/post_management', 'PostController');
Route::post('/post_management/change/{id}', 'PostController@change')->name('post_management.change');

Route::post('/post_management/changeStatus', 'PostController@change_api');
});
