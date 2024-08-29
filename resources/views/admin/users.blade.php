@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
    <style>
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

        .spinner-container img {
            justify-content: center;
            text-align: center;

        }

        .spinner-grow {
            margin-top: 20px;
        }

    </style>
    <script>
        window.addEventListener('load', function () {
            document.querySelector('.spinner-container').style.display = 'none';
        });

    </script>

    <div class="spinner-container">
        <div class="spinner-grow" style="width: 7rem; height: 7rem; color: white;" role="status">
            <span class="sr-only"></span>
            <img src="/img/logo.png" alt="Logo" style="width: 90px;margin: 17px">

        </div>
    </div>

    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                        <th>Videos</th>
                        <th>Pictures</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->videos->count() }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>

                                <form action="{{ route('admin.delete.user', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

