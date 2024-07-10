<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenAdmin\Admin\Facades\Admin;

class AdminProfileController extends Controller
{
    //


    public function adminProfile()
    {
        $admin = Auth::user(); // Retrieve authenticated admin user
        return view('admin.profile.AdminProfile', compact('admin'));
    }
}
