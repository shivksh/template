<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['prefix'=>'themes/AdminLTE'],function(){


    Route::get('/index','theme@home');
    Route::get('/index2','theme@home2');
    Route::get('/index3','theme@home3');

});


Route::get('/widget','theme@widget');




Route::group(['prefix'=>'themes/AdminLTE/pages/layout/'],function(){

    Route::get('/topNav','theme@topNav');
    Route::get('/topNavSide','theme@topNavSide');
    Route::get('/boxed','theme@boxed');
    Route::get('/fixed','theme@fixed');


});






Route::group(['prefix'=>'themes/AdminLTE'],function(){                                  //routes of those pages  using slicing


    Route::get('first','theme@firstPage')->name('first');
    Route::get('second','theme@secondPage')->name('second');
    Route::get('third','theme@thirdPage')->name('third');







});


Route::get('widgetS','theme@widgetS');               //widget page using content




// ==============================================================================================================================





Route::group(['prefix'=>'/themes/AdminLTE/'],function(){


Route::get('first-page','TempController@firstPage')->name('first-page');         //Modified routes using new Controller TempController
Route::get('second-page','TempController@secondPage')->name('second-page'); 
Route::get('third-page','TempController@thirdPage')->name('third-page'); 


Route::group(['prefix'=>'pages/'], function(){
    Route::get('widget-page','TempController@widgetPage')->name('widget-page'); 

    Route::get('table','UserController@relate')->name('table');


});






});



Route::get('data','TempController@fetch');




