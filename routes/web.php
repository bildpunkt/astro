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
Route::get('/projects/{id}', 'ProjectsController@show')->name('projects.show');
Route::get('/projects/{id}/edit', 'ProjectsController@edit')->name('projects.edit');
Route::put('/projects/{id}/update', 'ProjectsController@update')->name('projects.update');
Route::delete('/projects/{id}/destroy', 'ProjectsController@destroy')->name('projects.destroy');
