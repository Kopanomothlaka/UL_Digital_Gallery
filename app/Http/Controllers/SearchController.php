<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('text', 'like', '%' . $query . '%')->get();

        return view('pictures', compact('posts', 'query'));
    }
}
