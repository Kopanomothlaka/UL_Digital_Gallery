@extends('admin.layouts.app')

@section('title', 'Contact Submissions')

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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-primary text-white mailbox-widget pb-0">
                        <h2 class="text-white pb-3">Your Mailbox</h2>
                        <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox"
                                   href="#inbox" role="tab" aria-selected="true">
                                    <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                    <span class="d-none d-md-block"> INBOX</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                            <div>
                                <div class="row p-4 no-gutters align-items-center">
                                    <div class="col-sm-12 col-md-6">
                                        <h3 class="font-light mb-0"><i class="ti-email mr-2"></i>{{ $submissionCount }}
                                            emails</h3>
                                    </div>
                                </div>
                                <!-- Mail list -->
                                <div class="table-responsive">
                                    <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                        <thead>
                                        <tr>
                                            <th></th> <!-- Checkbox -->
                                            <th></th> <!-- Star -->
                                            <th>Name</th>
                                            <th>Message</th>
                                            <th>Received</th>
                                            <th>Actions</th> <!-- Delete Button -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($submissions as $submission)
                                            <tr>
                                                <td class="pl-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cst1"/>
                                                        <label class="custom-control-label" for="cst1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star text-warning"></i></td>
                                                <td>
                                                    <span class="mb-0 text-muted">{{ $submission->name }}</span>
                                                </td>
                                                <td>
                                                    <a class="link" href="javascript:void(0)">
                                                        <span
                                                            class="badge badge-pill text-white font-medium badge-danger mr-2">message</span>
                                                        <span class="text-dark">{{ $submission->message }}</span>
                                                    </a>
                                                </td>
                                                <td class="text-muted">{{ $submission->created_at }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.contact-submissions.destroy', $submission->id) }}"
                                                        method="POST" onsubmit="return confirmDelete()">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background: #edf1f5;
            margin-top: 20px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 0;
        }

        .mailbox-widget .custom-tab .nav-item .nav-link {
            border: 0;
            color: #fff;
            border-bottom: 3px solid transparent;
        }

        .mailbox-widget .custom-tab .nav-item .nav-link.active {
            background: 0 0;
            color: #fff;
            border-bottom: 3px solid #2cd07e;
        }

        .no-wrap td, .no-wrap th {
            white-space: nowrap;
        }

        .table td, .table th {
            padding: .9375rem .4rem;
            vertical-align: top;
            border-top: 1px solid rgba(120, 130, 140, .13);
        }

        .font-light {
            font-weight: 300;
        }
    </style>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this submission?');
        }
    </script>
@endsection
