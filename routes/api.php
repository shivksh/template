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


//this route fetching all data 
Route::get('/all-data','Api\ApiController@displayData');

Route::get('/specific-data/{id}','Api\ApiController@specificData');

Route::get('/update-data/{id}', 'Api\ApiController@updateData');

Route::get('/delete-data/{id}', 'Api\ApiController@deleteData');