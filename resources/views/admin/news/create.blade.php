@extends('admin.layouts.app')

@section('title', 'Create News')

@section('content')

    <div class="container mt-5 ">
        <h1 class="mb-2">Create News</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('admin.news.uploadedNews') }}">
                Uploaded News
            </a>

        </ol>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title"
                       class="form-control border border-primary rounded-pill my-1 py-2" required>
            </div>

            <div class="form-group mt-3">
                <label for="photo"><i class="fas fa-camera"></i> </label>
                <input type="file" id="photo" name="photo" class="form-control-file ">
            </div>

            <div class="form-group mt-3">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control border border-primary " rows="5"
                          required></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="author">Author</label>
                <input type="text" id="author" name="author"
                       class="form-control border border-primary rounded-pill my-1 py-2" required>
            </div>

            <div class="form-group mt-3">
                <label for="date">Date</label>
                <input type="date" id="date" name="date"
                       class="form-control border border-primary rounded-pill my-1 py-2" required>
            </div>


            <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Submit</button>
        </form>
    </div>

@endsection
