<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create-team', 'TeamsController@store');

Route::put("team/{id}", "TeamsController@update");

Route::get("team", "TeamController@teamListing");

Route::get("team/{id}", "TeamController@teamDetail");

Route::delete("team/{id}", "TeamsController@teamDelete");