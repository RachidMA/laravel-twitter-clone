<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $with = ['profile', 'comments.profile'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'profiles_id',
        'image'
    ];

    public function  profile()
    {
        return $this->belongsTo(Profile::class, 'profiles_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function comment()
    {
        return $this->hasOne(Comment::class)->latest();
    }

    public function createdAt()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function imageUrl()
    {
        return url('storage/' . $this->image);
    }
}
