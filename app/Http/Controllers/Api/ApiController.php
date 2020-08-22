<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostsModel;
use DB;

class ApiController extends Controller
{
    public function displayData(){
        $data = PostsModel::all();
        return response()->json($data);
    }

    public function specificData($any_id){
        $data = DB::table('users_models')
        ->join('posts_models', 'users_models.id','=','posts_models.user_id')
        ->select('users_models.*','posts_models.*')
        ->where('users_models.id','=',$any_id)
        ->get();
        return response()->json($data);
    }

    public function updateData($any_id){
        $data = DB::table('users_models')
        ->join('posts_models','users_models.id' , '=' , 'posts_models.user_id')
        ->where('users_models.id','=', $any_id)
        ->update(['postTitle' => 'NewProfile']);
        return response()->json($data);
    }

    public function deleteData($any_id){
        $data = DB::table('users_models')
        ->join('posts_models' , 'users_models.id' , '=', 'posts_models.user_id')
        ->where('users_models.id', '=',$any_id)
        ->delete();
        return response()->json($data);
    }
}
