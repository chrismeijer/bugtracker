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

use App\Http\Middleware\Authorize;

// STANDARD PAGES
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();
    Route::get('/not-authorized', [
        'as' => 'redirect-to-error-not-authorized',
        'uses' => 'Controller@redirectToErrorNotAuthorized',
    ]);
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('bugs', 'BugController');
    Route::resource('users', 'UserController');
    Route::resource('comments', 'CommentController');
    Route::resource('attachments', 'AttachmentController');

    // DELETE ROUTES
        Route::get('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);
        Route::get('roles/{id}/delete', ['as' => 'roles.delete', 'uses' => 'RoleController@destroy']);
        Route::get('categories/{id}/delete', ['as' => 'categories.delete', 'uses' => 'CategoryController@destroy']);
        Route::get('priorities/{id}/delete', ['as' => 'priorities.delete', 'uses' => 'PriorityController@destroy']);
        Route::get('resolutions/{id}/delete', ['as' => 'resolutions.delete', 'uses' => 'ResolutionController@destroy']);
        Route::get('statuses/{id}/delete', ['as' => 'statuses.delete', 'uses' => 'StatusController@destroy']);

// ROUTE GROUP CHECK FOR ROLE
    Route::group(['middleware' => Authorize::class], function() {
        Route::resource('roles', 'RoleController');
        Route::resource('categories', 'CategoryController');
        Route::resource('statuses', 'StatusController');
        Route::resource('priorities', 'PriorityController');
        Route::resource('resolutions', 'ResolutionController');
    });

/*Route::get('roles', function () {
    //
})->middleware(Authorize::class);*/

