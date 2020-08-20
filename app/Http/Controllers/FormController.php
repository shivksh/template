<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class FormController extends Controller
{
    public function registerPage(){
        return view('forms.register-page');
    }




    public function registerData(Request $request){
        $this->validate($request,[

            'name'=>'required|max:50',
            'email'=>'required|max:50|unique:users',
            'password'=>'required|confirmed|max:20|'
        ],[
            'name.required'=>'Please Enter Your Name',
            'name.max'=>'Name is Too Long',
            'email.required'=>'Please Enter Your Email',
            'email.max'=>'Email Address is too Long',
            'email.unique'=>'This Email is already Registered',


        ]);

         $register = new User;
         $register->name = $request->name;    
         $register->email = $request->email;         
         $register->password =bcrypt($request->password);        
         $register ->save(); 

         return redirect('/')->with('success','Registered Successfully Login Here');
     

    }



    public function loginPage(){

        return view('forms.login-page');

    }

    public function loginData(Request $request){
        $this->validate($request,[

            'email'=>'required|max:50|',
            'password'=>'required|max:20|'
        ],[
            
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('first-page');
        }
        return redirect()->route('login-page')->with('success','Please Enter Valid Data');
    }

}
