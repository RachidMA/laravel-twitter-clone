<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // protected $with = [
    //     'profile',
    //     'post'
    // ];

    protected $fillable = [
        'text',
        'post_id',
        'profile_id'
    ];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function createdAt()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
