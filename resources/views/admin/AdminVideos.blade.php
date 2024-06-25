@extends('admin.layouts.app')

@section('title', 'Approve or Reject Videos')

@section('content')

    <h1 class="mt-4">Videos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Videos</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Videos</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>

                            <a onclick="return confirm('Are you sure you want to delete this user?')"
                               href="" class="btn btn-success">Approve</a>

                            <a onclick="return confirm('Are you sure you want to delete this user?')"
                               href="" class="btn btn-danger"> Reject </a>
                        </td>


                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

