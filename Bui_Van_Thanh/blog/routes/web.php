<?php

use Illuminate\Support\Facades\Route;
use App\Post;
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

Route::resource('/cate_manager', 'Categorycontroller');
Route::resource('/apartment_info', 'ApartmentController');
Route::resource('/post_manager', 'PostController');
Route::get('/search_Post', 'PostController@searchPost');
Route::get('/survey', 'SurveyController@index');
Route::post('/surveySave', 'SurveyController@store');
