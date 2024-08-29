@extends('admin.layouts.app')

@section('content')

    <!-- CSS styles for the spinner and modal -->
    <style>
        /* Your existing spinner styles */
        .spinner-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(33, 37, 41);
            z-index: 9999;
        }

        /* Modal styles */
        .modal-body input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
    </style>

    <!-- Spinner -->
    <div class="spinner-container">
        <div class="spinner-grow" style="width: 7rem; height: 7rem; color: white;" role="status">
            <span class="sr-only"></span>
            <img src="/img/logo.png" alt="Logo" style="width: 90px;margin: 17px">
        </div>
    </div>

    <!-- Admin List -->
    <div class="card-body">
        <h1>Gallery Admins</h1>

        <!-- Table of admins -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Admin List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->created_at->format('M d, Y') }}</td>
                                <td>
                                    <!-- Update modal trigger -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#updateModal{{ $admin->id }}">
                                        Update
                                    </button>
                                    <!-- Delete form -->
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-3">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Update Modal -->
                            <!-- Update Modal -->
                            <div class="modal fade" id="updateModal{{ $admin->id }}" tabindex="-1"
                                 aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Update Admin Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <input type="text" name="name" value="{{ $admin->name }}" required>
                                                <input type="email" name="email" value="{{ $admin->email }}" required>
                                                <input type="password" name="password" placeholder="New Password">
                                                <input type="password" name="password_confirmation"
                                                       placeholder="Confirm Password">
                                                <!-- Add more fields as needed -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- End Update Modal -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function () {
            document.querySelector('.spinner-container').style.display = 'none';
        });
    </script>

@endsection


<!-- JavaScript for dismissing spinner on page load -->

