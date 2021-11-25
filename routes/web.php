<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('categories')->group(function () {

    Route::get('','App\Http\Controllers\CategoryController@index')->name('category.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('category.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('category.store')->middleware("auth");
    Route::get('edit/{category}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit')->middleware("auth");
    Route::post('update/{category}', 'App\Http\Controllers\CategoryController@update')->name('category.update')->middleware("auth");
    Route::post('delete/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy')->middleware("auth");
    Route::get('show/{category}', 'App\Http\Controllers\CategoryController@show')->name('category.show')->middleware("auth");
});

Route::prefix('posts')->group(function () {

    Route::get('','App\Http\Controllers\PostController@index')->name('post.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\PostController@create')->name('post.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\PostController@store')->name('post.store')->middleware("auth");
    Route::get('edit/{post}', 'App\Http\Controllers\PostController@edit')->name('post.edit')->middleware("auth");
    Route::post('update/{post}', 'App\Http\Controllers\PostController@update')->name('post.update')->middleware("auth");
    Route::post('delete/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.destroy')->middleware("auth");
    Route::get('show/{post}', 'App\Http\Controllers\PostController@show')->name('post.show')->middleware("auth");
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
