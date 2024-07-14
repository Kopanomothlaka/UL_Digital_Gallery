<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{


    //
    public function index()
    {
        // Fetch notifications for the authenticated user
        $notifications = Auth::user()->notifications;

        // Mark notifications as read
        Auth::user()->unreadNotifications->markAsRead();

        // Return view with notifications
        return view('notifications.index', ['notifications' => $notifications]);
    }
}
