<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     //this function validate credentials before that data sends to table  
    public function rules()
    {
        return [
            'email'=>'required|max:50',
            'password'=>'required|max:20'
        ];
    }


    //customize validation message 
    public function message()
    {
        return [
            'email.required'=>'Please Enter Your Email',
            'email.max'=>'Email Address is too Long',
            'email.unique'=>'This Email is already Registered',
        ];
    }

    


}
