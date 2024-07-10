<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function showWelcomePage()
    {
        // Fetch news from the database, ordered by creation date
        $news = News::orderBy('created_at', 'desc')->take(3)->get();

        // Pass the news to the welcome view
        return view('welcome', ['news' => $news]);
    }
}
