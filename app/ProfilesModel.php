<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilesModel extends Model
{

function belongProfile(){

    return $this->belongsTo(PostsModel::class,'user_id','pro_id');
}

}
