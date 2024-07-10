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
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-dark text-body"
                                   data-mdb-button-init data-mdb-ripple-init data-mdb-ripple-color="dark"
                                   style="z-index: 1;">
                                    Edit profile
                                </a>

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
                            <div class="mb-5  text-body">
                                <p class="lead fw-normal mb-1">About</p>
                                <div class="p-4 bg-body-tertiary">
                                    <p class="font-italic mb-1">{{ $user->name }}</p>
                                    <p class="font-italic mb-1">{{ $user->email }}</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

