<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_token extends Model
{
    protected $fillable=['user_id','token','expire_at'];
}
