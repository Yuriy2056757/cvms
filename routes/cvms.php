<?php

Route::get('/', 'CvmsController@index')->name('home');

// Set up standard RESTful routes for Article resources
Route::resource('articles', 'ArticleController');

// Set up standard RESTful routes for Experience resources
Route::resource('articles.experiences', 'ExperienceController');

// Set up standard RESTful routes for Qualification resources
Route::resource('articles.qualifications', 'QualificationController');

// Set up standard RESTful routes for Skill resources
Route::resource('articles.skills', 'SkillController');