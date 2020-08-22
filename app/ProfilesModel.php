<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilesModel extends Model
{

function belongProfile(){

    return $this->belongsTo(PostsModel::class,'id','user_id');
}

}
