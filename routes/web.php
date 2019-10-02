<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectsController@index')->name('projects.index');
    Route::get('/new', 'ProjectsController@new')->name('projects.new');
    Route::post('/create', 'ProjectsController@create')->name('projects.create');
    Route::get('/{project}', 'ProjectsController@show')->name('projects.show');
    Route::get('/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
    Route::put('/{project}/update', 'ProjectsController@update')->name('projects.update');
    Route::delete('/{project}/destroy', 'ProjectsController@destroy')->name('projects.destroy');

    Route::prefix('/{project}/issues')->group(function () {
        Route::get('/', 'IssuesController@index')->name('issues.index');
        Route::get('/new', 'IssuesController@new')->name('issues.new');
        Route::post('/create', 'IssuesController@create')->name('issues.create');
        Route::get('/{issue}', 'IssuesController@show')->name('issues.show');
        Route::get('/{issue}/edit', 'IssuesController@edit')->name('issues.edit');
        Route::put('/{issue}/update', 'IssuesController@update')->name('issues.update');
        Route::delete('/{issue}/destroy', 'IssuesController@destroy')->name('issues.destroy');
    });

    Route::prefix('/{project}/milestones')->group(function () {
        Route::get('/', 'MilestonesController@index')->name('milestones.index');
        Route::get('/new', 'MilestonesController@new')->name('milestones.new');
        Route::post('/create', 'MilestonesController@create')->name('milestones.create');
        Route::get('/{milestone}', 'MilestonesController@show')->name('milestones.show');
        Route::get('/{milestone}/edit', 'MilestonesController@edit')->name('milestones.edit');
        Route::put('/{milestone}/update', 'MilestonesController@update')->name('milestones.update');
        Route::delete('/{milestone}/destroy', 'MilestonesController@destroy')->name('milestones.destroy');
    });
});
