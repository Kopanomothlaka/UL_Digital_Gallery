@extends('layout')

@section('title', 'News')

@section('content')
    <section>
        <div class="container py-1">
            <div class="text-center mb-5">
                <img src="{{ asset('/img/logo.png') }}" class="img-fluid" alt="Logo"/>
                <h1 class="display-4">University Of Limpopo News</h1>
            </div>
            <div class="row">
                @foreach($news as $single_news)
                    <div class="col-xs-12 col-sm-4 mb-4">
                        <div class="card h-100">
                            <div class="news">
                                @if($single_news->photo)
                                    <img class="card-img-top" height="400px" width="400px"
                                         src="{{ asset('storage/' . $single_news->photo) }}"
                                         alt="Card image cap">
                                @else
                                    <img class="card-img-top" src="{{ asset('/img/default_image.jpg') }}"
                                         alt="Default Image">
                                @endif
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('news.show', $single_news->id) }}">

                                        {{ Str::limit($single_news->title, 15) }}
                                    </a>

                                </h4>
                                <p class="card-text">{{ Str::limit($single_news->body, 98) }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('news.show', $single_news->id) }}" class="btn btn-link btn-block"
                                   style="text-decoration: none; color: white;">Read More</a>
                                <p><small
                                        class="text-muted">Published: {{ $single_news->date->format('M d, Y') }}</small>
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
