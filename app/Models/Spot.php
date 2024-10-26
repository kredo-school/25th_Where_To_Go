<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $table = 'spots'; // テーブル名を指定

    // 更新可能なカラムのリストを指定
    protected $fillable = [
        'user_id',
        'name',
        'postalcode',
        'address',
        'latitude',
        'longitude'
    ];
    // 画像とのリレーション
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    # To get all the comments of a post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        // select * from likes
        return $this->hasMany(Like::class);
    }
    public function isLiked(){
        // CHECK IF YOU LIKED THE POST ALREADY
       return $this->likes()->where('user_id', auth()->user()->id)->exists();
    }
    // select * from likes where post_id = 15 and user_id = 2 ???? == TRUE

}