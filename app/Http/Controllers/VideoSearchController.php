<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $videos = Video::where('title', 'like', '%' . $query . '%')->get();

        return view('videos', compact('videos', 'query'));
    }
}
