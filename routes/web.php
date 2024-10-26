<?php

use System\Router\Web\Route;

Route::get('', 'HomeController@index', 'index');
Route::get('post/index', 'PostController@index', 'index');
Route::get('post/create', 'PostController@create', 'create');
Route::post('post/store', 'PostController@store', 'store');

Route::get('category/index', 'CategoryController@index', 'index');
Route::get('category/create', 'CategoryController@create', 'create');
Route::post('category/store', 'CategoryController@store', 'store');