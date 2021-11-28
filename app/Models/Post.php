<?php

namespace App\Models;

use App\Scope\PublishedScope;
use Illuminate\Database\Eloquent\Builder as IlluminateBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Builder;

class Post extends Model
{

    use HasFactory;
    use SoftDeletes;

    // protected $table = 'post';

    protected $guarded  = [];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    /*
        scope : تطبيق شروط معين على اي query
        على مستويين
        الاول global

    */

    //booted method created global scope
    protected static function booted()
    {
        static::addGlobalScope(new PublishedScope); //class


        // clouser function
        // static::addGlobalScope('public',function( IlluminateBuilder $builder){
        //     $builder->where('visibilaty','=','public');

        // });



    }

    // scope local  لازم ,تستخدم للاستخدام اللي انا بحتاجها

    public function scopePublic(IlluminateBuilder $builder)
    {
        $builder->where('visibilaty', '=', 'public');
    }

    //dynmic scope

    public function scopeVisibilaty(IlluminateBuilder $builder, $value)
    {
        $builder->where('visibilaty', $value);
    }


    // create relation betwwen comment and post one to many

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    //one to many

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //many to many relation

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class, // المودل الي انت بدك تربط فيه العلاقة
            'posts_tags', // الجدول المشترك في هذه الحالة
            'post_id', // الفرين كي الخاص بمودل اللي انا افيه
            'tag_id', // الفرين كي الخاص بمودل الي علاقة معه
            'id', // الخاص بالمودل الي انا فيه
            'id'    // الخاص بامودل الي معه علاقة

        );
    }

    public function likes()
    {
        return $this->morphToMany(
            User::class, // Get user
            'likeable', // relative column
            'likes', // table of likeable
        );
    }
}
