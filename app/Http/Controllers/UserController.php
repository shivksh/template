<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;


class UserController extends Controller
{

//Middleware Using Controller 

 public function __construct()
 {
     $this->middleware('custom-middleware');    
 }



    public function relate(){
        $users=UsersModel::all();
        return view('users.user-details',compact('users'));
    }


  


}
