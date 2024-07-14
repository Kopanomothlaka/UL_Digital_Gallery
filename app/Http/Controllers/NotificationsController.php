<?php

namespace App\Http\Controllers;

use App\Models\Mention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{


    //
    public function index()
    {
        // Fetch mentions for the authenticated user
        $mentions = Mention::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        // Count mentions
        $mentionsCount = $mentions->count();

        // Return view with mentions and count
        return view('notifications.index', [
            'mentions' => $mentions,
            'mentionsCount' => $mentionsCount
        ]);
    }

    public function deleteMention($id)
    {
        $mention = Mention::findOrFail($id);
        $mention->delete();

        return redirect()->back()->with('success', 'Mention deleted successfully.');
    }
}
