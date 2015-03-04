<?php

Route::get('/', 'MainPageController@index');

Route::get('/post/{id}', 'PostController@show');
