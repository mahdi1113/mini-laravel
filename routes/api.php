<?php

use System\Router\Api\Route;

Route::get('', 'HomeController@index', 'index');
Route::get('create', 'HomeController@create', 'create');
// Route::post('store', 'HomeController@store', 'store');
// Route::get('edit/{id}', 'HomeController@edit', 'edit');


Route::get('posts','PostControllerApi@index','index');
Route::get('categories','CategoryControllerApi@index','index');
Route::post('posts','PostControllerApi@store');
Route::post('categories','CategoryControllerApi@store');