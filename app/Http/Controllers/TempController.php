<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;

class TempController extends Controller
{

//Middleware Using Controller 
    public function __construct()
    {
    $this->middleware('custom-middleware',['only'=>['firstPage','secondPage','thirdPage','widgetPage']]);    
    }


    public function firstPage(){
    	return view('modified.first-page');
    }

    public function secondPage(){
    	return view('modified.second-page');
    }

    public function thirdPage(){
    	return view('modified.third-page');
    }

    public function widgetPage(){
    	return view('modified.widget-page');
    }



    

    

}
