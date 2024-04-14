<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nickName',
        'phoneNumber',
        'bio',
        'profile_image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'profile_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'profile_id');
    }

    public function saved_posts()
    {
        return $this->belongsToMany(Post::class, 'post_user', 'post_id', 'profile_id')->withTimestamps();
    }

    public function approved_posts()
    {
        return $this->belongsToMany(Post::class, 'post_user', 'post_id', 'profile_id')->withTimestamps();
    }

    //CREATE IMAGE URL
    public function imageUrl()
    {
        return url('storage/' . $this->profile_image);
    }
}
