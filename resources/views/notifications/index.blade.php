@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Notifications</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($notifications as $notification)
                                <li class="list-group-item">
                                    <a href="{{ url('/posts/' . $notification->data['post_id']) }}">
                                        {!! $notification->data['message'] !!}
                                    </a>
                                    <span class="float-right">{{ $notification->created_at->diffForHumans() }}</span>
                                </li>
                            @empty
                                <li class="list-group-item">No notifications found.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
