<?php

Route::get('/', 'CvmsController@index')->name('home');

// Set up standard RESTful routes for Article resource
Route::resource('articles', 'ArticleController');

// Set up standard RESTful routes for Experience resource
Route::resource('articles.experiences', 'ExperienceController');

// Set up standard RESTful routes for Qualification resource
Route::resource('articles.qualifications', 'QualificationController');