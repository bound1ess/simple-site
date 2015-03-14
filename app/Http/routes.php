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

// Only available to the registered users.
Route::group(['middleware' => 'auth'], function() {

    // Edit posts.
    Route::get('posts/{id}/edit', 'PostController@edit');
    Route::post('posts/{id}/edit', 'PostController@saveChanges');

    // Add a new post.
    Route::get('posts/new', 'PostController@create');
    Route::post('posts/new', 'PostController@store');

    // Edit a category.
    Route::get('categories/{id}/edit', 'CategoryController@edit');

    // Add a new category.
    Route::get('categories/new', 'CategoryController@create');
    Route::post('categories/new', 'CategoryController@store');
});
