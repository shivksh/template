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


//this route display the function in which all data are fetching of both tables using join
Route::get('/all-data','Api\ApiController@displayData');

// this  route will dsplay the function in which specific id data is fetchimh
Route::get('/specific-data/{id}','Api\ApiController@specificData');

//this route executing the function in which data is updated in posts_models table 
Route::get('/update-data/{id}', 'Api\ApiController@updateData');

//this route executing the function in which data is deleted in posts_models table 
Route::get('/delete-data/{id}' , 'Api\ApiController@deletePost');

//this route executing the function in which data is displayed betweeen a specific time period
Route::get('/specific-date' , 'Api\ApiController@specificDate');

//this  route executing the funvton in which data is displaying on the user who have their posts
Route::get('/only-data' , 'Api\ApiController@onlyPostData');