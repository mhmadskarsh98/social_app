<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail  // implements MustVerifyEmail use when veritfyEmail
{
    use HasApiTokens; // api
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable; //must use that to send mail or notification
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function posts()
    {

        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function comments()
    {

        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    // one to one relation

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function followers()
    {
        return $this->BelongsToMany(
            User::class,
            'followers',
            'follower_id',
            'following_id',
            'id',
            'id'

        );
    }

    public function followings()
    {

        return $this->BelongsToMany(
            User::class,
            'followers',
            'following_id',
            'follower_id',
            'id',
            'id'

        );
    }


    /// is not relation

    public function following($id)
    {
        return $this->followings()->where('follower_id', $id)->exists();
    }

    public function follower($id)
    {
        return $this->followers()->where('following_id', $id)->exists();
    }

    // nexmo moblie
    public function routeNotificationForNexmo($notification = null)
    {
        return $this->profile->mobile;
    }

    //morph relations
    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likeable', 'likes');
    }

    public function likedComments()
    {
        return $this->morphedByMany(Comment::class, 'likeable', 'likes');
    }

    


}
