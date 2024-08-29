@extends('admin.layouts.app')

@section('title', 'Approve or Reject Videos')

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

    <h1 class="mt-4">Videos</h1>
    <ol class="breadcrumb mb-4">
        <a href="{{ route('admin.videos.index') }}">
            Pending Videos
        </a>

    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Caption</th>
                        <th>Videos</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td>{{ $video->user->name }}</td>
                            <td>{{ $video->user->email }}</td>
                            <td>{{ $video->title }}</td>
                            <td>
                                <video src="{{ asset('storage/' . $video->video_path) }}" class="img-fluid"
                                       width="150px" height="100px"
                                       controls
                                       autoplay loop alt="Video"></video>
                            </td>
                            <td>{{ ucfirst($video->status) }}</td>
                            <td>
                                <form action="{{ route('admin.videos.approve', $video) }}" method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success"
                                            onclick="return confirm('Are you sure you want to approve this video?')">
                                        Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.videos.reject', $video) }}" method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to reject this video?')">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
