@extends('layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Notifications</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($mentions as $mention)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('pictures', ['id' => $mention->post_id]) }}">
                                            You were mentioned in a post.
                                        </a>
                                        <span>
                                            {{ $mention->created_at ? $mention->created_at->diffForHumans() : 'Unknown' }}
                                            <form action="{{ route('delete-mention', ['id' => $mention->id]) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </span>
                                    </div>
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
