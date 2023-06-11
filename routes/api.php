<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where register API routes for my application were built. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

// Defines a route that requires authentication using the Sanctum middleware.
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); // fetches the authenticated user instance.
});

