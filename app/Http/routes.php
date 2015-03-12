<?php

// Public. The main page.
Route::get('/', 'MainPageController@index');
Route::get('home', 'MainPageController@index');

// Posts and categories.
Route::get('post/{id}', 'PostController@show');
Route::get('category/{id}', 'CategoryController@show');

// Auth functions.
Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function() {

    // The login form and its handler.
    Route::get('login', 'UserController@form');
    Route::post('login', 'UserController@auth');
});

// Admin pages.
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    // The logout page.
    Route::get('logout', 'UserController@logout');

    // The dashboard page and its handler.
    Route::get('dashboard', 'AdminController@main');
    Route::post('dashboard', 'AdminController@saveMain');

    // The profile page and its handler.
    Route::get('profile', 'UserController@profile');
    Route::post('profile', 'UserController@saveProfile');

    // The posts page.
    Route::get('posts', 'AdminController@posts');

    // The categories page.
    Route::get('categories', 'AdminController@categories');
});
