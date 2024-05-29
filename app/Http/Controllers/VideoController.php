<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function uploadVideo(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:90000', // Adjust max file size as needed
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

        return view('videos', ['videos' => $videos]);
    }

    public function delete(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        // Check if the authenticated user is the owner of the video
        if (Auth::id() === $video->user_id) {
            $video->delete();
            return redirect()->back()->with('success', 'Video deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Unauthorized to delete this video.');
        }
    }

}
