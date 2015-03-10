<?php

Route::get('/', 'MainPageController@index');

Route::get('/post/{id}', 'PostController@show');

Route::get('/category/{id}', 'CategoryController@show');

// Admin.
Route::group(['prefix' => 'admin'], function() {

    // The login page.
    Route::get('/login', 'UserController@show');
    Route::post('/auth', 'UserController@auth');

    // The logout page.
    Route::get('/logout', [
        'middleware' => 'auth',
        'uses'       => 'UserController@logout',
    ]);

    // The dashboard.
    Route::get('/dashboard', [
        'middleware' => 'auth',
        'uses'       => 'UserController@dashboard',
    ]);
});
