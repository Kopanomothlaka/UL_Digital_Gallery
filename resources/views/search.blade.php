@extends('layout')
@section('content')

    <div class="container">
        <h1>Search Results</h1>

        <p>Showing results for: <strong>{{ $query }}</strong></p>

        @if ($posts->isEmpty())
            <p>No results found.</p>
        @else
            <ul class="list-group">
                @foreach($posts as $post)
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mb-4 shadow p-3 mb-1 bg-white rounded">

                                <div class="media mb-9" style="display: flex; align-items: center;">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                         class="d-block ui-w-40 rounded-circle"
                                         alt="" style="margin-left:15px;" style="flex-shrink: 0;">


                                    <div class="media-body ml-3">
                                        <h6 style="margin-left:15px;"> {{ $post->user->name }}</h6>
                                        <div class="text-muted small" style="margin-left:15px;">
                                            <h7>{{ $post->created_at->diffForHumans() }}</h7>
                                        </div>
                                    </div>
                                </div>
                                <p style="margin-left:15px;"> {{ $post->text }}
                                </p>
                                <img src="{{ asset('storage/' . $post->image_path) }}" class="img-fluid"
                                     style="width: 100%;"
                                     height="600px" alt="">


                                <div class="card-body">


                                </div>


                                <div class="card-footer">
                                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                                        <strong>123</strong> <small class="align-middle">Likes</small>
                                    </a>
                                    <a href="javascript:void(0)" class="d-inline-block text-muted ml-3"
                                       style="margin-left:10px; color:blue;">
                                        <small class="align-middle">Share</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </ul>
        @endif

    </div>
@endsection
