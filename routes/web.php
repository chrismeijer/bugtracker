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

Route::resource('roles', 'RoleController');
Route::resource('bugs', 'BugController');
Route::resource('categories', 'CategoryController');
Route::resource('users', 'User');
Route::resource('comments', 'CommentController');
Route::resource('statuses', 'StatusController');
Route::resource('priorities', 'PriorityController');
Route::resource('resolutions', 'ResolutionController');
Route::resource('attachments', 'AttachmentController');