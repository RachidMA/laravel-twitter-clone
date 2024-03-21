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

    public function job()
    {
        return $this->hasOne(Job::class, 'profiles_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'profiles_id');
    }

    public function saved_jobs()
    {
        return $this->belongsToMany(Job::class, 'job_user', 'job_id', 'profile_id')->withTimestamps();
    }

    public function approved_jobs()
    {
        return $this->belongsToMany(Job::class, 'job_user', 'job_id', 'profile_id')->withTimestamps();
    }

    //CREATE IMAGE URL
    public function imageUrl()
    {
        return url('storage/' . $this->profile_image);
    }
}
