<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //commentテーブルはpostテーブルにぶら下がっている。
    public function post(){
    return $this->belongsTo('App\Post');
    }
    protected $table = 'comments';
    protected $fillable = [
        'commenter', 'comment', 'post_id'
    ];
}
