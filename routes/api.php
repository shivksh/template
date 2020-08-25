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



Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    

});


// group middleware to protect multiple routes
Route::group(['middleware' => ['jwt.auth']], function(){

//this route display the function in which all data are fetching of both tables using join , middleware for protecting the route
Route::get('/all-data','Api\ApiController@displayData') -> middleware('jwt.auth');


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

//this route will insert the data to db table using api
Route::post('/insert-data' , 'Api\CrudController@insertData');

});