<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{

    function profileData(){

        return $this->hasOne(ProfilesModel::class,'pro_Id','user_id');
    }

    function postData(){

        return $this->hasMany(PostsModel::class,'post_Id','user_id');
    }

}
