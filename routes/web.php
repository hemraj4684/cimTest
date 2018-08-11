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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogs', 'BlogController@index')->name('blogs.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/blogs/create', 'BlogController@create')->name('blogs.create');
	Route::post('/blogs', 'BlogController@store')->name('blogs.store');
	Route::get('/blogs/{id}/edit', 'BlogController@edit')->name('blogs.edit');
	Route::patch('/blogs/{id}', 'BlogController@update')->name('blogs.update');
});
Route::get('/blogs/{id}', 'BlogController@show')->name('blogs.show');







