<?php

Route::get('/', 'CvmsController@index')->name('home');

// Set up standard RESTful routes for Article resource
Route::resource('/articles', 'ArticleController');