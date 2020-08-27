<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostsModel;
use App\UsersModel;
use DB;
use PDF;
use Mail;

class ApiController extends Controller
{

    //middleware applied on controller
    public function __construct()
    {
    $this->middleware('jwt.auth',['only' => ['diplayData' , 'specificData' , 'updateData', 'deletePost' , 'specificDate' , 'onlyPostData']]);    
    }


    //this method display the all data of posts_models table in a json file 
    public function displayData(){
        $data = PostsModel::all();
        return response()->json($data);
    }

    //this method display the posts_models table data of specific id of users_models table using join 
    // and that data will be displey in json file
    public function specificData($any_id){
        $data = DB::table('users_models')
        ->join('posts_models', 'users_models.id','=','posts_models.user_id')
        ->select('users_models.id','users_models.UserName','posts_models.PostTitle','posts_models.PostContent')
        ->where('users_models.id','=',$any_id)
        ->get();
        return response()->json($data);
    }

    //this method update the posts_models table specific field using id of users_models table using join operation
    //this json file will return the no. of fields which are updated
     //this can also done using with join operation by using the id key in users_models table
    public function updateData($any_id){
        $data = DB::table('posts_models')
        ->where('posts_models.id','=', $any_id)
        ->update(['postTitle' => 'NewProfile']);
        return 'Data update SuccessFully';
    }

    //this method delete the specific field of posts_models table using user_id i.e. id of users_models table
    //this json file will return the no. of fields which are deleted 
    public function deletePost($any_id){
        $data = DB::table('posts_models')
        ->where('user_id', '=',$any_id)
        ->delete();
        return 'Data Deleted SuccessFully';
    }

    //this method will fetch the data between a specific time period from posts_models table
    public function specificDate(){
        $data = DB::table('posts_models')
        ->whereBetween('created_at',['2020-08-22','2020-08-24'])
        ->get();
        return response()->json($data);
    }


    //this method fetch the data of the users who have their posts in posts_models table
    public function onlyPostData(){
        $data = DB::table('users_models')
        ->join('posts_models', 'users_models.id', '=' , 'posts_models.user_id')
        ->select('posts_models.user_id','users_models.UserName','posts_models.PostTitle','posts_models.PostContent')
        ->get();
        return response()->json($data);
    }

    //this method fetching the data from the table within a specific date and of a specific user 
    //this data will be send to a blade file pdf.pdf-api 
    //after generating pdf Mail function send this to the users mail. 
    public function postToUser($random){
        $user = DB::table('posts_models')
        ->join('users_models' , 'posts_models.user_id' , '=' , 'users_models.id')
        ->select('posts_models.user_id', 'users_models.UserName','users_models.Email', 'users_models.Phone' ,'posts_models.PostTitle' , 'posts_models.PostContent' ) 
        ->where( 'posts_models.user_id' , '=', $random )
        ->whereBetween('posts_models.created_at',['2020-08-22' , '2020-08-25'])
        ->get();

        
        $pdf = PDF::loadView('pdf.pdf-api',compact('user'));
        $detail = UsersModel::find($random);
        $data['email'] = $detail->Email;
        $data['name'] = $detail->UserName;
        $data['subject'] = 'Checking Mail' ;


        //Mail calss is here sending pdf as a mail to the given email.
        Mail::send('emails.pdf-mail-body',$data,function($message) use ($data,$pdf){
            $message -> to($data['email'],$data['name'])
            ->subject( $data['subject'] )
            ->attachData($pdf -> output() , 'details.pdf');
        });

    }
    
}
