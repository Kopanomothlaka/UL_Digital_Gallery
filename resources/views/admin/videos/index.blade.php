@extends('admin.layouts.app')

@section('title', 'Approve or Reject Videos')

@section('content')

    <h1 class="mt-4">Videos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Videos</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered">
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
