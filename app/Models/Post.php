<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;


    // protected $with = ['profile', 'comments.profile'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'city',
        'profile_id',
        'category_id',
        'image'
    ];


    public function  profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
