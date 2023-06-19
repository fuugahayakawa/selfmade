<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['user_id','content','image','del_flg'];
    protected $dates=['created_at'=>'datetime:Y/m/d'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function reports(){
        return $this->hasMany('App\Houkoku');
    }
}
