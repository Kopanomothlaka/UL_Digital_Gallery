@extends('layout')
@section('content')

    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center">
                <div class="col col-lg-9 col-xl-8">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row"
                             style="background-color: #c6aa4c; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                    style="width: 150px; z-index: 1">


                            </div>
                            <div class="ms-3" style="margin-top: 130px;color: white;">
                                <h5 style="color: white;">{{ $user->name }}</h5>

                            </div>
                        </div>
                        <div class="p-4 text-black bg-body-tertiary">
                            <div class="d-flex justify-content-end text-center py-1 text-body">


                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ $user->name }}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm New Password</label>
                                    <input id="password_confirmation" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>

                                <!-- Add more fields as needed -->

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

                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
