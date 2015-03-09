<?php

Route::get('/', 'MainPageController@index');

Route::get('/post/{id}', 'PostController@show');

Route::get('/category/{id}', 'CategoryController@show');

// Admin.
Route::group(['prefix' => 'admin'], function() {
    // Auth.
    Route::get('/login', 'UserController@show');
    Route::post('/auth', 'UserController@auth');

    // The dashboard.
    Route::get('/dashboard', 'UserController@dashboard', ['middleware' => 'auth']);
});
