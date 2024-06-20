<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function uploadVideo(Request $request)
    {

        if (!auth()->check()) {
            return redirect()->route('log')->with('error', 'You must be logged in to upload videos.');
        }
        $request->validate([
            'title' => 'required|string',
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:9000000000000', // Adjust max file size as needed
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        $video = new Video;
        $video->user_id = auth()->id();
        $video->title = $request->title;
        $video->video_path = $videoPath;
        $video->save();

        return redirect()->back()->with('success', 'Video uploaded successfully.');
    }

    public function showVideos()
    {
        $videos = Video::orderByDesc('created_at')->get();
        $posts = Post::all();

        return view('videos', [
            'videos' => $videos,
            'posts' => $posts
        ]);
    }

    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    public function like(Video $video, Request $request)
    {
        $request->user()->likes()->create(['video_id' => $video->id]);
        return redirect()->back()->with('success', 'Video liked!');
    }

    public function unlike(Video $video, Request $request)
    {
        $request->user()->likes()->where('video_id', $video->id)->delete();
        return redirect()->back()->with('success', 'Video unliked!');
    }

    public function delete(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');


    }
}
