<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>@yield('title', 'Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>
</head>
<body class="loginstyle">

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container mt-5  ">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card border-0 shadow">
                    <div class="card-body text-centre">
                        <div class="d-flex justify-content-center">
                            <img src="/img/logo.png" alt="" class="img-fluid">
                        </div>
                        <h1 class="text-center">Admin Log in</h1>
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


                        <form action="{{ route('admin.login.post') }}" method="POST">
                            @csrf

                            <label for="username">Email</label>
                            <input type="email" name="email" id=""
                                   class="form-control rounded-pill my-1 py-2 custom-input"/>

                            <label for="username">Password</label>
                            <input type="password" name="password" id=""
                                   class="form-control rounded-pill my-1 py-2 custom-input"/>


                            <div class="text-center mt-3">

                                <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>


</body>
</html>
