@extends('layout')

@section('title' ,'Home')

@section('content')

    <div class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-7 col-md-8 mx-auto text-center">
                    <h1 class="display-6 text-white ">University of Limpopo</h1>
                    <h4 class="display-1 text-white bold ">
                        <span style="color:#C8AB4D;">Digital</span> Gallery </h4>


                    <p class="text-white">
                        Unveiling the Past, Present, and Possibilities in Pixels

                    </p>

                    <a href="#news" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>
    </div>

    <section id="news">
        <div class="container">
            <div class="row mb-4">

                <div class="col-md-8 mx-auto text-center">
                    <h6 style="color:#C8AB4D;">stay updated</h6>
                    <h1 style="color:#C8AB4D;">News</h1>
                    <p> Stay informed with the latest news from the University of Limpopo, where groundbreaking
                        research, academic achievements, campus updates, and community initiatives are brought to the
                        forefront. Our news section is a gateway to insightful articles, press releases, and
                        announcements that highlight the university's contributions to education, innovation, and
                        societal impact. Discover stories of excellence, progress, and collaboration that shape the
                        dynamic landscape of our institution and the communities we serve. <span><a href="news"
                                                                                                    style="text-decoration: underline; color:blue;">News</a></span>
                    </p>
                </div>
            </div>


            <div class="row g-1">
                <div class="row ">
                    <h4 style="color:#C8AB4D; ">Recent News </h4>
                    <a href="news">more</a>


                </div>


                <div class="row mt-3">
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
        </div>

    </section>

   

    <section id="videos">
        <div class="container">
            <div class="row mb-4">

                <div class="col-md-8 mx-auto text-center">
                    <h6 style="color:#C8AB4D;">Videos</h6>
                    <h1 style="color:#C8AB4D;">Our Videos</h1>
                    <p> Explore the vibrant campus life and academic excellence at the University of Limpopo through our
                        captivating videos. From insightful lectures and groundbreaking research to cultural events and
                        student activities, our videos showcase the diverse and dynamic spirit of our university
                        community. Join us on a visual journey that highlights our commitment to education, innovation,
                        and the holistic development of our students. <span><a href="videos"
                                                                               style="text-decoration: underline; color:blue;">see all videos</a></span>
                    </p>
                </div>


            </div>


            <div class="row g-3">
                <div class="col-1g-4 col-sm-6">
                    <div class="gallery">

                        <iframe width="949" height="534" src="https://www.youtube.com/embed/W7y5HKABUQg"
                                title="Campus View | #ULEvents2024" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>

                    </div>
                </div>
                <div class="col-1g-4 col-sm-6">
                    <div class="gallery">
                        <iframe width="949" height="534" src="https://www.youtube.com/embed/y3N0hMtms08"
                                title="University of Limpopo Autumn Graduation Ceremony | Day 1, Afternoon Session"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    </div>

                </div>
                <div class="col-1g-4 col-sm-6">
                    <div class="gallery">
                        <iframe width="949" height="534" src="https://www.youtube.com/embed/vXH3Tcc3DtI"
                                title="The 2nd African Traditional and Natural Product Medicine Conference #ulevents2022"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-1g-4 col-sm-6">
                    <div class="gallery">

                        <iframe width="949" height="534" src="https://www.youtube.com/embed/-EqrEQextH4"
                                title="RECAP: 2022 University Sport South Africa (USSA) Games" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    </div>

                </div>
                <div class="col-1g-4 col-sm-6">
                    <div class="gallery">

                        <iframe width="949" height="534" src="https://www.youtube.com/embed/szZxRmO6IFo"
                                title="UL STUDENT ACCOMMODATION: ON-CAMPUS M +V side Residences ✨️turfloop campus 2024✨️"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    </div>

                </div>

            </div>

        </div>

    </section>






    <footer>

        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @ 2023 copyright all right reserved


                    </div>
                    <a href="#" style="color: white; text-underline: #0a58ca;">admin</a>


                </div>
            </div>
        </div>

        </div>

    </footer>

@endsection













