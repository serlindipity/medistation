<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where I registered my web routes for my application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

// Defines a route for the root URL ("/").
Route::get('/', function () {
    return redirect(route('home'));
}); // Redirects user to the "home" route using the route() helper function.

// Defines a route for the "/favicon.ico" URL.
Route::get('/favicon.ico', function () {
    return redirect(route('home')); // Redirects user to the "home" route using the route() helper function.
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // Defines a GET route for "/home".
    Route::get('/home', function () {
        return view('home'); // returns the "home" view.
    })->name('home'); 

    Route::resource('/posts', "App\Http\Controllers\PostController")->names('posts'); // Defines a resourceful route for the "/posts" URL.
    Route::get('/post/edit/{id}', "App\Http\Controllers\PostController@getPost")->name('post.edit'); // Defines a GET route for "/post/edit/{id}".
    Route::get('/delete/image/{id}', "App\Http\Controllers\PostController@deleteImage")->name('delete.image'); // Defines a GET route for "/delete/image/{id}".
    Route::post('/post/save', "App\Http\Controllers\PostController@update")->name('post.save'); // Defines a POST route for "/post/save".
    Route::get('/feeds', "App\Http\Controllers\PostController@followers")->name('feeds'); // Defines a GET route for "/feeds".
    Route::resource('/manage/users', "App\Http\Controllers\UserController")->except(['create', 'show', 'store'])->names('users'); // Defines a resourceful route for the "/manage/users" URL.
    Route::get('/{username}', "App\Http\Controllers\ProfileController@show")->name('profile'); // Defines a GET route for "/{username}".
});
