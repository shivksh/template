<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    function chartJs(){
        return view('charts.chart-js');
    }

    function flotChart(){
    return view('charts.flot-chart');
    }


    public function inlineChart(){
    	return view('charts.inline-chart');
    }
}
