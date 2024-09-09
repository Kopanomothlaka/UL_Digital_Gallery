@extends('admin.layouts.app')

@section('title', 'Uploaded News')

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
    <section>
        <div class="container mt-5">
            <h1 class="mb-2">Uploaded News</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.news.create') }}">Home</a></li>
                <li class="breadcrumb-item active">Uploaded News</li>
            </ol>
            <div class="row">
                @foreach($news as $single_news)
                    <div class="col-xs-12 col-sm-4 mb-4">
                        <div class="card h-100">
                            <div class="news">
                                @if($single_news->photo)
                                    <img class="card-img-top" height="500px" width="500px"
                                         src="{{ asset('/photos/' . $single_news->photo) }}"
                                         alt="Card image cap">
                                @else
                                    <img class="card-img-top" src="{{ asset('/img/default_image.jpg') }}"
                                         alt="Default Image">
                                @endif
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ $single_news->title }}
                                </h4>
                                <p class="card-text collapsed">
                                    {{ $single_news->body }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text"><small class="text-muted">Last
                                        updated {{ $single_news->date->diffForHumans() }}</small></p>
                                <p class="card-text"><small class="text-muted">by {{ $single_news->author }}</small></p>

                                <!-- Edit and Delete Buttons -->
                                <div class="mt-3">
                                    <button class="btn btn-primary btn-sm edit-news"
                                            data-id="{{ $single_news->id }}"
                                            data-title="{{ $single_news->title }}"
                                            data-body="{{ $single_news->body }}"
                                            data-toggle="modal"
                                            data-target="#editNewsModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form action="{{ route('admin.news.destroy', $single_news->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-2"
                                                onclick="return confirm('Are you sure you want to delete this news item?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <div class="modal fade" id="editNewsModal" tabindex="-1" role="dialog" aria-labelledby="editNewsModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editNewsForm" action="{{ route('admin.news.update', ':id') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNewsModalLabel">Edit News</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-news-title">Title</label>
                            <input type="text" class="form-control" id="edit-news-title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="edit-news-body">Body</label>
                            <textarea class="form-control" id="edit-news-body" name="body" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    <style>
        .card-text span {
            display: none;
        }

        .card-text.expanded span {
            display: inline;
        }

        .card-text.collapsed span {
            display: none;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('.edit-news').on('click', function () {
                const newsId = $(this).data('id');
                const newsTitle = $(this).data('title');
                const newsBody = $(this).data('body');

                $('#editNewsForm').attr('action', "{{ route('admin.news.update', ':id') }}".replace(':id', newsId));
                $('#edit-news-title').val(newsTitle);
                $('#edit-news-body').val(newsBody);

                $('#editNewsModal').modal('show');
            });

            // Close modal programmatically if data-dismiss is not working
            $('.close, .btn-secondary').on('click', function () {
                $('#editNewsModal').modal('hide');
            });
        });


    </script>

@endsection
