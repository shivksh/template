<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class CrudController extends Controller
{
 
public function __construct(){
    $this->middleware('jwt.auth',['only' => ['insertData' , 'loginData' ]]);
}


    
    public function insertData(Request $request){
        $data = new User;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> password = bcrypt($request -> password);
        $data -> save();
        return 'Data Saved Successfully';
    }

    public function loginData(Request $request){
        if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
            return 'Login SuccessFully, Good to see you Again';
        }
        else{
            return 'Login Failed, Please Recheck Credentials';
        }
    }
}
