<!-- resources/views/news/show.blade.php -->

@extends('layout')
@section('title', $news->title)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-3">{{ $news->title }}</h1>
        <img src="{{ asset('storage/' . $news->photo) }}" class="img-fluid mb-3" alt="News Image">
        <p>{{ $news->body }}</p>
        <p><small class="text-muted">Author: {{ $news->author }}</small></p>
        <p><small class="text-muted">Published: {{ $news->date->format('M d, Y') }}</small></p>
    </div>
@endsection
