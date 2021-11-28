<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use HasFactory;
    use Notifiable; //must use that to send mail or notification

    protected $fillable =['user_id', 'post_id','content'];

    public function post()

    {
        return $this->belongsTo(Post::class,'post_id','id');

    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    //morphs relation ()
    // اليوزر الي عملو لايكك
    public function likes()
    {
        return $this->morphToMany(
        User::class , // Get user
        'likeable', // relative column
        'likes',// table of likeable
        );

    }
}



