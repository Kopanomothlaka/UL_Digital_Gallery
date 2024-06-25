@extends('admin.layouts.app')

@section('content')
    <div class="card-body">
        <h1>Pictures</h1>
        
        <a href="{{ route('admin.posts.pending') }}">
            Pending Posts
        </a>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-6">
                    <div class="card mt-3">
                        <div class="card-header"><strong>{{ $post->user->name }}</strong></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->text}}</h5>
                            @if($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image" width="500"
                                     height="500">

                            @endif
                            <h6 class="card-title mt-3 "><strong>{{ $post->status }}</strong></h6>
                        </div>
                        <div class="card-footer bg-transparent border-success">


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
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
