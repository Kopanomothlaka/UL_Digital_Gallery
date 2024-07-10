@extends('admin.layouts.app')

@section('content')

    <style>
        .spinner-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(33, 37, 41);
            z-index: 9999;
        }

        .spinner-container img {
            justify-content: center;
            text-align: center;

        }

        .spinner-grow {
            margin-top: 20px;
        }

    </style>
    <script>
        window.addEventListener('load', function () {
            document.querySelector('.spinner-container').style.display = 'none';
        });

    </script>

    <div class="spinner-container">
        <div class="spinner-grow" style="width: 7rem; height: 7rem; color: white;" role="status">
            <span class="sr-only"></span>
            <img src="/img/logo.png" alt="Logo" style="width: 90px;margin: 17px">

        </div>
    </div>
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
