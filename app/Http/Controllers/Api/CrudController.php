<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class CrudController extends Controller
{
 
    //the functions in the only field in construct function is protect by middleware
  public function __construct(){
    $this->middleware('jwt.auth',['only' => ['insertData' , 'loginData' ]]);
}


    //insert the data into database using the api
    public function insertData(Request $request){
        $data = new User;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> password = bcrypt($request -> password);
        $data -> save();
        return 'Data Saved Successfully';
    }

    //login data form the user table credential using below function and it will return success message in return when successfully executed. 
    public function loginData(Request $request){
        if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
            return 'Login SuccessFully, Good to see you Again';
        }
        else{
            return 'Login Failed, Please Recheck Credentials';
        }
    }
}
