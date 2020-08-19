<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    function mydata(){
        return $this->hasMany(PriceModel::class,'Product_id','id');
    }
}
