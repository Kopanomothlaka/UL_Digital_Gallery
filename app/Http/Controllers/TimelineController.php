<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class TimelineController extends Controller
{
    public function postToTimeline(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'image' => 'required|image|max:50000', // Adjust max file size as needed
        ]);


        $imagePath = $request->file('image')->store('images', 'public');

        $post = new Post;
        $post->user_id = auth()->id();
        $post->text = $request->text;
        $post->image_path = $imagePath;
        $post->save();


        return redirect()->back()->with('success', 'Post created successfully.');
    }


    public function showPictures()
    {
        $posts = Post::orderByDesc('created_at')->get();

        return view('pictures', ['posts' => $posts]);
    }

    public function delete(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }


}
