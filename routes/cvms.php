<?php

Route::get('/', 'CvmsController@index')->name('home');

// Set up standard RESTful routes for User resources
Route::resource('users', 'UserController', ['except' => ['index', 'create']]);

// Set up standard RESTful routes for Article resources
Route::resource('articles', 'ArticleController');
Route::resource('articles.experiences', 'ExperienceController');
Route::resource('articles.qualifications', 'QualificationController');
Route::resource('articles.skills', 'SkillController');
Route::resource('articles.contact_infos', 'ContactInfoController');