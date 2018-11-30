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
Route::get('/', function () {
    return view('home');
});
Route::group(['prefix' => 'blog'],function () {
    Route::get('/','CreateBlogController@index')->name('blogs.index');
    Route::get('/create','CreateBlogController@create')->name('blogs.create');
    Route::post('/create','CreateBlogController@store')->name('blogs.store');
    Route::get('/{id}/edit','CreateBlogController@edit')->name('blogs.edit');
    Route::post('/{id}/update','CreateBlogController@update')->name('blogs.update');
    Route::get('/{id}/show','CreateBlogController@show')->name('blogs.show');
    Route::get('/{id}/destroy','CreateBlogController@destroy')->name('blogs.destroy');
    Route::get('/search','CreateBlogController@search')->name('blogs.search');
    Route::get('/validate', 'CreateBlogController@checkValidation')->name('blogs.validate');

});
