@extends('layout')
@section('title' , 'Log')

@section('content')

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-5 m-auto">
                <div class="card border-1 shadow">
                    <div class="card-body text-centre">
                        <div class="d-flex justify-content-center">
                            <img src="/img/logo.png" alt="" class="img-fluid">
                        </div>
                        <h1 class="text-center">Log in</h1>
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


                        <form action="{{route('log.post')}}" method="POST">
                            @csrf

                            <label for="username">Email</label>
                            <input type="email" name="email" id=""
                                   class="form-control rounded-pill my-1 py-2 custom-input"/>

                            <label for="username">Password</label>
                            <input type="password" name="password" id=""
                                   class="form-control rounded-pill my-1 py-2 custom-input"/>


                            <div class="text-center mt-3">
                                <div class="d-inline-block">
                                    <p class="d-inline">Already have an account?</p>
                                    <a href="register" class="nav-link d-inline m">create account</a>
                                </div>
                                <button class="btn btn-primary w-100 mt-3">Login</button>
                                <a href="forget-password" class="nav-link d-inline m">Reset Password</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
