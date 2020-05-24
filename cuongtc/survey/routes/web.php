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
Route::get('/', 'SurveyController@welcome');
Route::post('post_survey','SurveyController@post_survey');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/survey_management','SurveyController');
