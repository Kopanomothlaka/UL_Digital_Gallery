<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        $posts = Post::orderBy('created_at', 'desc')->get();

        // Return the view with the posts variable
        return view('admin.AdminPictures', ['posts' => $posts]);
    }

    public function AdminVideos()
    {
        $videos = Video::orderBy('created_at', 'desc')->get();

        return view('admin.AdminVideos', ['videos' => $videos]);
    }


    public function pendingPosts()
    {
        $posts = Post::where('status', 'pending')->get();
        return view('admin.posts.pending', compact('posts'));
    }


    public function approvePost(Post $post)
    {
        $post->update(['status' => 'approved']);
        return redirect()->route('admin.AdminPictures')->with('success', 'Post approved successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed', // confirmed ensures password_confirmation field matches
        ]);

        // Find the admin record by ID
        $admin = Admin::findOrFail($id);

        // Update admin details
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];

        // Check if a new password is provided
        if ($request->filled('password')) {
            $admin->password = Hash::make($validatedData['password']);
        }

        // Save the changes
        $admin->save();

        // Redirect back or return a response as needed
        return redirect()->route('admin.AdminList')->with('success', 'Admin details updated successfully');
    }

    public function rejectPost(Post $post)
    {
        $post->update(['status' => 'rejected']);
        return redirect()->route('admin.AdminPictures')->with('success', 'Post rejected successfully.');
    }

    public function showPendingVideos()
    {
        $videos = Video::where('status', 'pending')
            ->orderBy('created_at', 'desc') // Order by creation date in descending order
            ->get(); // Fetch videos with 'pending' status
        return view('admin.videos.index', compact('videos'));
    }

    public function Vapprove(Video $video)
    {
        $video->update(['status' => 'approved']);
        return redirect()->route('admin.AdminVideos')->with('success', 'Video approved successfully.');
    }

    public function Vreject(Video $video)
    {
        $video->update(['status' => 'rejected']);
        return redirect()->route('admin.AdminVideos')->with('success', 'Video rejected successfully.');
    }

    public function showAdminList()
    {
        $admins = Admin::all(); // Retrieve all admins from the database
        return view('admin.AdminList', compact('admins')); // Pass the data to the view
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id); // Find the admin by ID
        $admin->delete(); // Delete the admin

        return redirect()->route('admin.AdminList')->with('success', 'Admin deleted successfully');
    }

    public function adminProfile()
    {

        $admin = Auth::guard('admins')->user(); // Retrieve authenticated admin user

        return view('admin.profile.AdminProfile', [
            'admin' => $admin,

        ]);
    }


}
