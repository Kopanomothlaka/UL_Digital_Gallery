@extends('admin.layouts.app')

@section('content')
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Admin Profile</h2>
                    <p class="text-secondary text-center lead fs-4 mb-5">Welcome, {{ $admin->name }}!</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row gy-4 gy-lg-0 justify-content-md-center">
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="card widget-card border-light shadow-sm">
                        <div class="card-body p-4">
                            <ul class="nav nav-tabs" id="profileTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                            data-bs-target="#overview-tab-pane" type="button" role="tab"
                                            aria-controls="overview-tab-pane" aria-selected="true">Overview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                                            data-bs-target="#password-tab-pane" type="button" role="tab"
                                            aria-controls="password-tab-pane" aria-selected="false">Password
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content pt-4" id="profileTabContent">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel"
                                     aria-labelledby="overview-tab" tabindex="0">
                                    <h5 class="mb-3">Profile Overview</h5>
                                    <div class="row g-0">
                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                            <div class="p-2">First Name</div>
                                        </div>
                                        <div
                                            class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                            <div class="p-2">{{ $admin->name }}</div>
                                        </div>


                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                            <div class="p-2">Email</div>
                                        </div>
                                        <div
                                            class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                            <div class="p-2">{{ $admin->email }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Profile Tab -->
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                     aria-labelledby="profile-tab" tabindex="0">
                                    <h5 class="mb-3">Edit Profile</h5>
                                    <form action="{{ route('admin.profile.update') }}" method="POST"
                                          class="row gy-3 gy-xxl-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12 col-md-6">
                                            <label for="inputFirstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="inputFirstName"
                                                   name="first_name" value="{{ $admin->name }}">
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="inputEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" name="email"
                                                   value="{{ $admin->email }}">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Password Tab -->
                                <div class="tab-pane fade" id="password-tab-pane" role="tabpanel"
                                     aria-labelledby="password-tab" tabindex="0">
                                    <h5 class="mb-3">Change Password</h5>
                                    <form action="{{ route('admin.password.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row gy-3 gy-xxl-4">
                                            <div class="col-12">
                                                <label for="currentPassword" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="currentPassword"
                                                       name="current_password">
                                            </div>
                                            <div class="col-12">
                                                <label for="newPassword" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="newPassword"
                                                       name="password">
                                            </div>
                                            <div class="col-12">
                                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirmPassword"
                                                       name="password_confirmation">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
