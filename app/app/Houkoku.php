<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Houkoku extends Model
{
    protected $fillable=['houkoku','user_id','reporter_id'];
}
