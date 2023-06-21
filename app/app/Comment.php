<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=['user_id','post_id','comment'];
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function comment_exist($user_id, $post_id) {        
        return Comment::where('user_id', $user_id)->where('post_id', $post_id)->exists();       
    }
}
