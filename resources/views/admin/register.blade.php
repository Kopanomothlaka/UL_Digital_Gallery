@extends('admin.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="container mt-5 pt-5">
            <div class="row">

                <div class="col-12 col-sm-7 col-md-5 m-auto">


                    <div class="card border-1 shadow">

                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="/img/logo.png" alt="" class="img-fluid">


                            </div>
                            <h5 class="text-center">Add New Admin</h5>
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
                            <form method="POST" action="{{ route('admin.register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label ">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                           class="form-control rounded-pill my-1 py-2 custom-input @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }} " required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" type="email"
                                           class="form-control rounded-pill my-1 py-2 custom-input @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="form-control rounded-pill my-1 py-2 custom-input @error('password') is-invalid @enderror"
                                           name="password"
                                           required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation"
                                           class="form-label ">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" type="password"
                                           class="form-control rounded-pill my-1 py-2 custom-input"
                                           name="password_confirmation" required>
                                </div>

                                <div class="text-center mt-3">

                                    <button type="submit" class="btn btn-primary w-100 mt-3 ">ADD ADMIN</button>

                                </div>

                                <div class="text-left mt-3 p-3">

                                    <a href="{{ route('admin.AdminList') }}">Check Admins</a>

                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
