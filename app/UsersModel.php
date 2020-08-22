<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{

    function profileData(){

        return $this->hasOne(ProfilesModel::class,'user_id','id');
    }

    function postData(){

        return $this->hasMany(PostsModel::class,'user_id','id');
    }

}
