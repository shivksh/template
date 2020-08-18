<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class theme extends Controller
{
    public function home(){
    return view('homePage');
    }

    public function home2(){
        return view('homePage2');
        }

    public function home3(){
        return view('homePage3');
        }

    public function widget(){
        return view('widget');
        }

        public function topNav(){
            return view('layoutOption.topNav');
            }
        
    

    public function topNavSide(){
        return view('layoutOption.topNavSide');
        }   

     public function boxed(){
        return view('layoutOption.boxed');
        }  

        public function fixed(){
            return view('layoutOption.fixed');
            } 










            public function firstPage(){                                            //template using slicing
                return view('templateUsingSlicing.firstPage');
                }

            public function secondPage(){                                            
                    return view('templateUsingSlicing.secondPage');
                    }


            public function thirdPage(){                                            
                        return view('templateUsingSlicing.thirdPage');
                        }


                        public function widgetS(){                                            
                            return view('templateUsingSlicing.widgetS');
                            }            
    

    

}