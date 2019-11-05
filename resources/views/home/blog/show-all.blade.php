@extends('home.blog.layout')

@section('style')
    <style>
        .jumbotron {
            /*color: white;*/
            background-image: url("{{ url('storage/'.$head['header-section-image']->filename) }}");
            box-shadow: inset 0 0 0 1000px rgba(255, 255, 255, 0.74);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 35vh;
        }
    </style>
@endsection

@section('content')
{{--    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('{{ url('storage/'.$head['header-section-image']->filename) }}');" data-stellar-background-ratio="0.5">--}}
{{--        <div class="overlay" style="background-color: lightgray; opacity: 0.5;"></div>--}}
{{--        <div class="container">--}}
{{--            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">--}}
{{--                <div class="col-md-9 ftco-animate pb-5 text-center">--}}
{{--                    --}}{{--                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span>--}}
{{--                    --}}{{--                </p>--}}
{{--                    <h1 class="mb-3 bread">Our Activity</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="mt-sm-5 text-center" style="color: #575D5A">OUR ACTIVITY</h1>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt">
        <div class="container mt-5">
            <div class="row d-flex justify-content-md-center">
                @foreach($aktivitas_kita as $a)
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <div class="text">
                                <h3 class="heading">
                                    <a href="{{ url('aktivitas-kita/'.$a->id) }}">
                                        <div class="row">
                                            <div class="col text-truncate">
                                                {{ $a->judul }}
                                            </div>
                                        </div>
                                    </a>
                                </h3>
                                <div class="meta mb-3">
                                    <div>
                                        <a href="{{ url('aktivitas-kita/'.$a->id) }}">{{ $a->created_at }}</a>
                                    </div>
                                    <div>
                                        <a href="{{ url('aktivitas-kita/'.$a->id) }}">{{ $a->username }}</a>
                                    </div>
                                </div>
                                <a href="{{ url('aktivitas-kita/'.$a->id) }}" class="block-20 img" style="background-image: url('{{ url('storage/'.$a->image) }}');">
                                </a>
                                <p>{{ $a->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
