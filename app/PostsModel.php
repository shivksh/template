<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{

    function belongPost(){

        return $this-> belongsTo(UsersModel::class,'user_id','post_id');
    }

}
