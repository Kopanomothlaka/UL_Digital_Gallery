@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <h1>Pending Posts</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Pictures/Videos</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->user->email }}</td>
                        <td>
                            @if($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image" width="100">
                            @endif
                        </td>
                        <td>{{ $post->status }}</td>
                        <td>
                            <form action="{{ route('admin.posts.approve', $post) }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('admin.posts.reject', $post) }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
