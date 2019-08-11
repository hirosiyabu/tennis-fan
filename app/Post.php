<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    Public function comments()
    {
      // commentsテーブルのデータを引っ張てくる
      return $this->hasMany('App\Comment');
    }
    public function user()
    {
      // usersテーブルのデータが繋がる
      return $this->belongsTo('App\User');
    }
  

    protected $fillable = [
        'title', 'content', 'user_id'
    ];

}
