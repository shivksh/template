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


Route::get('/welcome', function () {
    return view('welcome');
});


Route::group(['prefix'=>'themes/AdminLTE'],function(){


    Route::get('/index','theme@home');
    Route::get('/index2','theme@home2');
    Route::get('/index3','theme@home3');

});


Route::get('/widget','theme@widget');

Route::post('/register-data','FormController@registerData')->name('register-data');


Route::get('/','FormController@loginPage')->name('login-page');
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

//Starting from Here

//Laravel default 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Custom Middleware CheckLogin 
Route::group(['middleware' => ['custom-middleware']], function () {                   
//group whose prefix is '/theme/Admin'
Route::group(['prefix'=>'admin/'],function(){

// Dashboard Pages 
//Using custom-middleware on a route 
Route::get('first-page','TempController@firstPage')->name('first-page')->middleware('custom-middleware');       //Modified routes using new Controller TempController  
Route::get('second-page','TempController@secondPage')->name('second-page'); 
Route::get('third-page','TempController@thirdPage')->name('third-page'); 

});

// another group whose prefix is 'pages/'
Route::group(['prefix'=>'pages/'], function(){
    Route::get('widget-page','TempController@widgetPage')->name('widget-page'); 
    Route::get('table','UserController@relate')->name('table');                   //table route using new Controller i.e UserController
});



Route::group(['prefix'=>'pages/charts'],function(){

    Route::get('/chart-js','ChartController@chartJs')->name('chart-js');
    Route::get('/flot-chart','ChartController@flotChart')->name('flot-chart');
    Route::get('/inline-chart','ChartController@inlineChart')->name('inline-chart');
});

});



//View Register Page 
Route::get('/register-page','FormController@registerPage')->name('register-page');

// Data Validate and Send to database using registerData method in FormController
Route::post('/register-data','FormController@registerData')->name('register-data');

//View Login Page 
Route::get('/','FormController@loginPage')->name('login-page');

// Data fetching and login to next page using loginData method in FormController
Route::post('/login-data','FormController@loginData')->name('login-data');


