@extends('layout')
@section('title' , 'reset')
@section('content')
    <main>

        <div>


            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-7 col-md-5 m-auto">
                        <div class="card border-0 shadow">
                            <div class="card-body text-centre">
                                <div class="d-flex justify-content-center">
                                    <img src="/img/logo.png" alt="" class="img-fluid">
                                </div>
                                <h1 class="text-center">Reset Password</h1>
                                <p class="text-center">Digital <span style="color:#0E6545;">Gallery</span></p>

                                <div class="mt-1">

                                    @if($errors->any())
                                        <div class="col-12">
                                            @foreach($errors->all() as $error) @endforeach
                                            <div class="alert alert-danger"> {{$error}} </div>
                                        </div>

                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger"> {{session('error')}} </div>
                                    @endif
                                    @if(session()->has('success'))
                                        <div class="alert alert-success"> {{session('success')}} </div>
                                    @endif
                                </div>


                                <p class="text">The link will be send to your email to reset your password</p>

                                <form action="{{route('reset.password.post')}}" method="POST">
                                    @csrf
                                    <input type="text" name="token" hidden value="{{$token}}">

                                    <label for="username">Email</label>
                                    <input type="email" name="email" id=""
                                           class="form-control rounded-pill my-1 py-2 custom-input"/>

                                    <label for="username">Enter new password</label>
                                    <input type="password" name="password" id=""
                                           class="form-control rounded-pill my-1 py-2 custom-input"/>

                                    <label for="username">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id=""
                                           class="form-control rounded-pill my-1 py-2 custom-input"/>


                                    <div class="text-center mt-3">

                                        <button class="btn btn-primary w-100 mt-3">RESET</button>
                                        <a href="log" class="nav-link d-inline m">LOG IN</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
