<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table='detail';  
protected $fillable=['d_package_id','d_product_id'];
}
