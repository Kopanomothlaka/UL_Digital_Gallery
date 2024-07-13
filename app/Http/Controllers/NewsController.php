<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // Fetch all news articles from the database
        $news = News::orderBy('created_at', 'desc')->get();

        // Pass the $news variable to the view
        return view('news', ['news' => $news]);
    }

    //
    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
            'body' => 'required',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $news = new News();
        $news->title = $request->title;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $news->photo = $path;
        }

        $news->body = $request->body;
        $news->author = $request->author;
        $news->date = $request->date;
        $news->save();

        return redirect()->route('admin.news.create')->with('success', 'News created successfully.');
    }

    // Display uploaded news
    public function uploaded()
    {
        // Fetch all news from database
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.uploadedNews', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        $news->title = $request->title;
        $news->body = $request->body;
        $news->save();

        return redirect()->route('admin.news.uploadedNews')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.uploadedNews')->with('success', 'News deleted successfully.');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.more-info-page', compact('news'));
    }

    public function showWelcomePage()
    {
        $news = News::all(); // Fetch news data from the database
        return view('welcome', compact('news')); // Pass the news data to the view
    }
}
