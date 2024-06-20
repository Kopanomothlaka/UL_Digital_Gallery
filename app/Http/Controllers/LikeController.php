<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, Video $video)
    {
        // Check if the user has already liked the video
        $like = Like::where('user_id', auth()->id())
            ->where('video_id', $video->id)
            ->first();

        if (!$like) {
            // Create a new like record
            $like = Like::create([
                'user_id' => auth()->id(),
                'video_id' => $video->id,
            ]);

            // Increment the like count for the video
            $video->increment('likes_count');
        }

        return response()->json(['message' => 'Video liked']);
    }

    public function unlike(Request $request, Video $video)
    {
        // Check if the user has already liked the video
        $like = Like::where('user_id', auth()->id())
            ->where('video_id', $video->id)
            ->first();

        if ($like) {
            // Delete the like record
            $like->delete();

            // Decrement the like count for the video
            $video->decrement('likes_count');
        }

        return response()->json(['message' => 'Video unliked']);
    }
}
