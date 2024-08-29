<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\UserMentioned;
use App\Notifications\UserVideoMentioned;
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
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:999999999999', // Adjust max file size as needed
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        $video = new Video;
        $video->user_id = auth()->id();
        $video->title = $request->title;
        $video->video_path = $videoPath;
        $video->save();

        // Extract mentions from title
        preg_match_all('/@([\w\s]+)/', $video->title, $matches);
        $mentionedUsers = User::whereIn('name', array_map('trim', $matches[1]))->get();

        // Attach mentions to video
        $video->mentions()->attach($mentionedUsers->pluck('id'));

        // Notify mentioned users
        foreach ($mentionedUsers as $user) {
            $user->notify(new UserVideoMentioned($user, $video));
        }

        return redirect()->back()->with('success', 'Video uploaded successfully but wait for the approval from Admin');
    }

    public function showVideos()
    {
        $videos = Video::orderByDesc('created_at')->get();
        $posts = Post::all();

        $videos = $videos->where('status', 'approved');


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

    public function updateTitle(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $video = Video::findOrFail($id);
        $video->title = $request->title;
        $video->save();

        return redirect()->back()->with('success', 'Title updated successfully.');
    }


}
