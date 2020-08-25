<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests\InsertValidation;
use App\Http\Requests\LoginValidation;


class FormController extends Controller
{
    //This method opens the register-page.balde.php which is inside the forms folder
    public function registerPage(){
        return view('forms.register-page');
    }

     //This method opens the login-page.balde.php which is inside the forms folder
    public function loginPage(){
       return view('forms.login-page');
    }



    //this method insert the data from the register form and save data to database table
    //that data will be insert after validating by InsertValidation form request
    public function registerData(InsertValidation $request){
         $register = new User;
         $register->name = $request->name;    
         $register->email = $request->email;         
         $register->password =bcrypt($request->password);        //bcrypt method encode the data for security purpose while saving paasword to db table
         $register ->save(); 
         return redirect('/')->with('success','Registered Successfully Login Here');
    }



    //this method login to redirect to next page when the credential will correct
    //these credentials should be according to InsertValidation form request
    public function loginData(LoginValidation $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('first-page');
        }
        return redirect()->route('login-page')->with('success','Please Enter Valid Data');
    }

}
