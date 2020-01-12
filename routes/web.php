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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//membuat otomatis dan dapat memanggil semua isi postcontroller
Route::resource('/post', 'PostsController');
Route::resource('/penulis', 'AuthorController');
Route::resource('/kategori', 'CategoryController');
Route::resource('/tags', 'TagController');
