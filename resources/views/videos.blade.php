<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UL Digital Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="/script/script.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        .nav-link.dropdown-toggle {
            position: relative;
            padding-right: 1.5rem;
        }

        .nav-link.dropdown-toggle::after {
            display: none;
        }

        /* Additional styles for the dropdown */
        .dropdown-container .dropdown-menu {
            background-color: #ffffff;
            color: #000000;
        }

        .nav-link.dropdown-toggle i {
            display: inline-block !important;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg py-1.5 sticky-top ">
    <div class="container-fluid">
        <a href="welcome">
            <img src="/img/logo.png" alt="Logo">
        </a>


        <form class="form-inline my-2 my-lg-0" action="{{ route('video.search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" style="margin-left: 15px;" placeholder="Search here"
                   aria-label="Search" name="query" id="searchInput">
        </form>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="welcome">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pictures">Pictures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="videos">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i>
                                <img src="/img/profileicon.png" alt="icon"
                                     style="height: 35px;width: 35px;align-content: center">

                            </i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pictures">Pictures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="videos">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact">Contact</a>
                    </li>
            </ul>
            <a href="log" class="btn btn-primary">Log in</a>
            @endauth
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mx-auto" style="margin-top: 25px;">

            <form id="postFormV" action="{{ route('video.upload') }}" method="POST"
                  class="d-flex ms-auto shadow p-3 mb-1 bg-white rounded" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <textarea class="form-control" id="postContentV"
                              style="height: 70px; margin-bottom: 10px; resize: none;" name="title"
                              placeholder="What's on your mind..."></textarea>
                    <div class="input-group-append p-3">
                        <label for="video-upload" class="btn btn-sm btn-default">
                            <i class="fa fa-video-camera" style="color: white;"></i>
                            <input type="file" id="video-upload" name="video" accept="video/*" style="display: none;"
                                   onchange="previewVideo(this)">
                        </label>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </form>
            <div class="mt-1">
                @if($errors->any())
                    <div class="col-12">
                        @foreach($errors->all() as $error) @endforeach
                        <div class="alert alert-danger"> {{$error}} </div>
                    </div>

                @endif
                @if(session()->has('error'))
                    <div class="alert-danger"> {{session('error')}} </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success"> {{session('success')}} </div>
                @endif
            </div>


            <div class="row" id="video-preview" style="display: none;">
                <div class="col-lg-12 mx-auto">
                    <video id="preview-video" width="320" height="240" controls>
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container posts-content">

    @if ($videos->isEmpty())
        <p>No results found.</p>
    @else
        @foreach($videos as $video)
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card mb-4 shadow p-3 mb-1 bg-white rounded" style="margin :15px;">
                        <div class="media mb-9" style="display: flex; align-items: center;">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                 class="d-block ui-w-40 rounded-circle"
                                 alt="" style="margin-left:15px;" style="flex-shrink: 0;">
                            <div class="media-body ml-3">
                                <h6 style="margin-left:15px;"> {{ $video->user->name }}</h6>
                                <div class="text-muted small" style="margin-left:15px;">
                                    <h7>{{ $video->created_at->diffForHumans() }}</h7>
                                </div>
                            </div>
                            @auth
                                <div class="nav-item dropdown"
                                     style="margin-left: auto; border-radius: 5px; padding: 5px;">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left"
                                         style="background-color: #ffffff; color: #000000;"
                                         aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item"
                                           href="{{ route('videos.delete', ['id' => $video->id]) }}"><i
                                                class="fas fa-trash-alt"></i> Delete</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a>

                                    </div>
                                </div>
                            @endauth
                        </div>
                        <p style="margin-left:15px;">{{ $video->title }}</p>
                        <video src="{{ asset('storage/' . $video->video_path) }}" class="img-fluid" style="width: 100%;"
                               height="600px" controls
                               autoplay loop alt="Video"></video>
                        <div class="card-body">
                            <!-- Add any additional content related to the video here -->
                        </div>


                        <div>
                            @if ($video->likes()->where('user_id', auth()->id())->exists())
                                <form action="{{ route('videos.unlike', $video->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">Unlike</button>
                                </form>
                            @else
                                <form action="{{ route('videos.like', $video->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">Like</button>
                                </form>
                            @endif

                            <span id="like-count">{{ $video->likes()->count() }}</span> likes
                        </div>

                    </div>
                </div>
            </div>

        @endforeach
    @endif

</div>

<script>
    document.getElementById('postFormV').addEventListener('submit', function (event) {
        @guest
        event.preventDefault();
        window.location.href = '{{ route('log') }}';
        @endguest
    });


    function previewVideo(input) {
        var file = input.files[0];
        var video = document.getElementById('preview-video');
        var source = document.createElement('source');
        source.setAttribute('src', URL.createObjectURL(file));
        video.appendChild(source);
        document.getElementById('video-preview').style.display = 'block';
    }

    // Load videos without autoplay
    document.addEventListener("DOMContentLoaded", function () {
        var videos = document.querySelectorAll("video");
        videos.forEach(function (video) {
            video.autoplay = false;
        });
    });


</script>


</body>

</html>
