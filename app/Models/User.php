<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_picture',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function mentionedInPosts()
    {
        return $this->belongsToMany(Post::class, 'mentions');
    }

    public function hasLiked(Video $video)
    {
        return $this->likes()->where('video_id', $video->id)->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedPictures()
    {
        return $this->belongsToMany(Post::class, 'like_pictures', 'user_id', 'post_id')->withTimestamps();
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    // Define relationship with pictures
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function mentionedInVideos()
    {
        return $this->belongsToMany(Video::class, 'video_user');
    }


}
