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

Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/new', 'ProjectsController@new')->name('projects.new');
Route::post('/projects/create', 'ProjectsController@create')->name('projects.create');
Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
Route::put('/projects/{project}/update', 'ProjectsController@update')->name('projects.update');
Route::delete('/projects/{project}/destroy', 'ProjectsController@destroy')->name('projects.destroy');

Route::get('/projects/{project}/issues', 'IssuesController@index')->name('issues.index');
Route::get('/projects/{project}/issues/new', 'IssuesController@new')->name('issues.new');
Route::post('/projects/{project}/issues/create', 'IssuesController@create')->name('issues.create');
Route::get('/projects/{project}/issues/{issue}', 'IssuesController@show')->name('issues.show');
Route::get('/projects/{project}/issues/{issue}/edit', 'IssuesController@edit')->name('issues.edit');
Route::put('/projects/{project}/issues/{issue}/update', 'IssuesController@update')->name('issues.update');
Route::delete('/projects/{project}/issues/{issue}/destroy', 'IssuesController@destroy')->name('issues.destroy');

Route::get('/projects/{id}/milestones', 'MilestonesController@index')->name('milestones.index');
Route::get('/projects/{id}/milestones/new', 'MilestonesController@new')->name('milestones.new');
Route::post('/projects/{id}/milestones/create', 'MilestonesController@create')->name('milestones.create');
Route::get('/projects/{id}/milestones/{milestone_id}', 'MilestonesController@show')->name('milestones.show');
Route::get('/projects/{id}/milestones/{milestone_id}/edit', 'MilestonesController@edit')->name('milestones.edit');
Route::put('/projects/{id}/milestones/{milestone_id}/update', 'MilestonesController@update')->name('milestones.update');
Route::delete('/projects/{id}/milestones/{milestone_id}/destroy', 'MilestonesController@destroy')->name('milestones.destroy');
