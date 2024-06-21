@extends('layout')
@section('content')

    <div class="container posts-content">

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

                                    @auth

                                        <div class="nav-item dropdown"
                                             style="margin-left: auto; border-radius: 5px; padding: 5px;">
                                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#"
                                               role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-left"
                                                 style="background-color: #ffffff; color: #000000;"
                                                 aria-labelledby="navbarDropdown">


                                                <a class="dropdown-item"
                                                   href="{{ route('posts.delete', ['id' => $post->id]) }}"><i
                                                        class="fas fa-trash-alt"></i> Delete</a>


                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a>


                                            </div>

                                        </div>
                                    @endauth


                                </div>

                                <textarea class="form-control" id="textAreaExample5" rows="3"></textarea>
                                <label class="form-label" for="textAreaExample5">50% width of the parent</label>


                                <img src="{{ asset('storage/' . $post->image_path) }}" class="img-fluid"
                                     style="width: 100%;"
                                     height="600px" alt="">


                                <div class="card-body">


                                </div>


                                <div>
                                    @auth()

                                        @if (auth()->user()->likedPictures->contains($post->id))
                                            <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="unlike-btn">
                                                    <i class="fas fa-thumbs-down"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="like-btn">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    <span>{{ $post->likes()->count() }}</span> likes


                                </div>
                            </div>
                        </div>
                    </div>

            @endforeach
        @endif

    </div>

@endsection
