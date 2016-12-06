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

Auth::routes();

Route::pattern('project', '[A-Za-z0-9-]+');
Route::pattern('projects', '[A-Za-z0-9-,]+');
Route::pattern('id', '[0-9]+');

Route::resource('project', 'ProjectController');
Route::get('projects', 'ProjectBrowseController@index');
Route::get('projects/{projects}', 'ProjectBrowseController@show');

Route::get('download/{fileID}', 'DownloadController@get');

Route::get('/', function() {
	return 'test';
});
