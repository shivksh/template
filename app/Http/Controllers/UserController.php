<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;


class UserController extends Controller
{
    public function relate(){
        $users=UsersModel::all();
        return view('users.user-details',compact('users'));
    }
}
