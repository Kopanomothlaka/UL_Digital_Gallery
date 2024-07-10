@extends('admin.layouts.app')

@section('content')
    <!-- Profile 1 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Profile</h2>
                    <p class="text-secondary text-center lead fs-4 mb-5">The Profile page is your digital hub, where you
                        can fine-tune your experience. Here's a closer look at the settings you can expect to find in
                        your profile page.</p>
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
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel"
                                     aria-labelledby="overview-tab" tabindex="0">

                                    <h5 class="mb-3">Profile</h5>
                                    <div class="row g-0">
                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                            <div class="p-2">First Name</div>
                                        </div>
                                        <div
                                            class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                            <div class="p-2">KAYEE</div>
                                        </div>


                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                            <div class="p-2">Email</div>
                                        </div>
                                        <div
                                            class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                            <div class="p-2">GMAIL</div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                     aria-labelledby="profile-tab" tabindex="0">
                                    <form action="#!" class="row gy-3 gy-xxl-4">
                                        <div class="col-12">
                                            <div class="row gy-2">


                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="inputFirstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="inputFirstName" value="Ethan">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="inputLastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="inputLastName" value="Leo">
                                        </div>


                                        <div class="col-12 col-md-6">
                                            <label for="inputPhone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" id="inputPhone" value="+12486798745">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="inputEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail"
                                                   value="leo@example.com">
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="password-tab-pane" role="tabpanel"
                                     aria-labelledby="password-tab" tabindex="0">
                                    <form action="#!">
                                        <div class="row gy-3 gy-xxl-4">
                                            <div class="col-12">
                                                <label for="currentPassword" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="currentPassword">
                                            </div>
                                            <div class="col-12">
                                                <label for="newPassword" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="newPassword">
                                            </div>
                                            <div class="col-12">
                                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirmPassword">
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
