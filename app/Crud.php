<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table='use';  
protected $fillable=['first_name','last_name','gender','qualifications'];  
}
