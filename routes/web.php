<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route; // sometime it's optional

Route::get('/', 'HelloController@index');


Route::get('contact/us', 'HelloController@contact')->name('contact');
Route::get('about/us', 'HelloController@about')->name('about');

// Category CRUD
Route::get('add/category', 'BoloController@addCategory')->name('add.category');
Route::post('store/category', 'BoloController@storeCategory')->name('store.category');
Route::get('all/category', 'BoloController@allCategory')->name('all.category');
Route::get('view/category/{id}', 'BoloController@viewCategory');
Route::get('delete/category/{id}', 'BoloController@deleteCategory');
Route::get('edit/category/{id}', 'BoloController@editCategory');
Route::post('update/category/{id}', 'BoloController@updateCategory');

// Post CRUD
Route::get('write/post', 'PostController@writePost')->name('write.post');
Route::post('store/post', 'PostController@storePost')->name('store.post');
Route::get('all/post', 'PostController@allPost')->name('all.post');
Route::get('view/post/{id}', 'PostController@viewPost');
Route::get('edit/post/{id}', 'PostController@editPost');
Route::post('update/post/{id}', 'PostController@updatePost');
Route::get('delete/post/{id}', 'PostController@deletePost');