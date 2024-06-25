<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function dashboard()
    {
        $userCount = User::count();
        $postCount = Post::count(); // Assuming you have a Post model for news/posts
        $videoCount = Video::count(); // Assuming you have a Video model

        return view('admin.dashboard', compact('userCount', 'postCount', 'videoCount'));
    }


    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function blockUser($id)
    {
        $user = User::find($id);
        $user->blocked = true;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User blocked successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function AdminPictures()
    {
        // Fetch the posts from the database
        $posts = Post::all();

        // Return the view with the posts variable
        return view('admin.AdminPictures', ['posts' => $posts]);
    }

    public function AdminVideos()
    {

        return view('admin.AdminVideos');
    }


    public function pendingPosts()
    {
        $posts = Post::where('status', 'pending')->get();
        return view('admin.posts.pending', compact('posts'));
    }
    

    public function approvePost(Post $post)
    {
        $post->update(['status' => 'approved']);
        return redirect()->route('admin.posts.pending')->with('success', 'Post approved successfully.');
    }

    public function rejectPost(Post $post)
    {
        $post->update(['status' => 'rejected']);
        return redirect()->route('admin.posts.pending')->with('success', 'Post rejected successfully.');
    }


}
