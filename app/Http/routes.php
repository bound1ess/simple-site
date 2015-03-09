<?php

Route::get('/', 'MainPageController@index');

Route::get('/post/{id}', 'PostController@show');

Route::get('/category/{id}', 'CategoryController@show');

// Admin.
Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', 'UserController@show');
});
