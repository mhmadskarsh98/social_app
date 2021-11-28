<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $appends = ['avatar_url', 'full_name']; // any attribute plus , we can send im apends im json

    protected $hidden = ['created_at', 'updated_at'];

    ///////////////////// Relations /////////////////////////////////



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /////////////////////////////////////////////////////////

    public function getFullNameAttribute()
    {
        if (!$this->first_name && !$this->last_name) {

            return $this->user->name;
        }

        return $this->first_name . '  ' . $this->last_name;
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }

        return 'https://ui-avatars.com/api/?name=' . $this->full_name;
    }
}
