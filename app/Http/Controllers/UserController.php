<?php

namespace App\Http\Controllers;

use App\Models\User;

// Make sure to import your User model
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }
}
