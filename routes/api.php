<?php

use Illuminate\Http\Request;

Route::prefix('/company')->group(function () {
    Route::get('/', 'CompanyController@index');
    Route::get('/{company}', 'CompanyController@show');
    Route::post('/', 'CompanyController@create');
    Route::put('/{company}', 'CompanyController@update');
    Route::delete('/{company}', 'CompanyController@delete');

    Route::post('/{company}/project', 'ProjectController@create');
});

Route::prefix('/project')->group(function () {
    Route::get('/', 'ProjectController@index');
    Route::get('/{project}', 'ProjectController@show');
    Route::post('/', 'ProjectController@createWithAssociate');
    Route::put('/{project}', 'ProjectController@update');
    Route::delete('/{project}', 'ProjectController@delete');

    Route::post('/{project}/task', 'TaskController@create');
    Route::post('/{project}/comment', 'CommentController@createFromProject');
});

Route::prefix('/task')->group(function () {
    Route::get('/', 'TaskController@index');
    Route::get('/{task}', 'TaskController@show');
    Route::put('/{task}', 'TaskController@update');
    Route::delete('/{task}', 'TaskController@delete');

    Route::post('/{task}/worktime', 'TaskController@createTaskWorkTime');
    Route::post('/{project}/comment', 'CommentController@createFromTask');
});