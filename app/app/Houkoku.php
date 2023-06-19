<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Houkoku extends Model
{
    protected $fillable=['post_id','content'];
    protected $table='houkoku';
}
