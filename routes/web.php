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

    // 
        Route::get('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);

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

