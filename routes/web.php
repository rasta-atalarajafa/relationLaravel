<?php

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

Auth::routes();
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ajax/{id}', 'HomeController@getAjax')->name('ajax.index');
Route::post('/ajax', 'HomeController@storeAjax')->name('ajax.store');

//posts
Route::resource('post','PostsController');

//authors
Route::resource('author','AuthorsController');

//category
Route::resource('category','CategoriesController');

//Tags
Route::resource('tag','TagsController');

