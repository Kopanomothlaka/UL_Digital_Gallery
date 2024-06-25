@extends('admin.layouts.app')

@section('title', 'Approve or Reject Pictures')

@section('content')

    <h1 class="mt-4">Pictures</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pictures</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Pictures</th>
                        <th>Status</th>
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
                               href="" class="btn btn-danger btn-sm">Approve</a>

                            <a onclick="return confirm('Are you sure you want to delete this user?')"
                               href="" class="btn btn-danger btn-sm">Reject</a>
                        </td>
                        <td>


                        </td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

