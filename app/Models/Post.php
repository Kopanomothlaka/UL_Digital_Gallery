<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'image_path'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function likes()
    {
        return $this->belongsToMany(User::class, 'like_pictures', 'post_id', 'user_id')->withTimestamps();
    }

    public function mentions()
    {
        return $this->belongsToMany(User::class, 'mentions');
    }


}
