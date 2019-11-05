@extends('home.blog.layout')

@section('style')
    <style>
        .jumbotron {
            /*color: white;*/
            background-image: url("{{ url('storage/'.$content->image) }}");
            box-shadow: inset 0 0 0 1000px rgba(255, 255, 255, 0.74);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 40vh;
        }
        .layer {
            background-color: rgba(248, 247, 216, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
{{--                    <h4 class="mb-3 bread">Our Activity</h4>--}}
{{--                    <h1><strong>{{ $content->judul }}</strong></h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="text-center mt-sm-5">AKTIVITAS KITA</p>
            <h1 class=" text-center">{{ $content->judul }}</h1>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <img class="img-fluid" src="{{ url('storage/'.$content->image) }}" alt="gambar rumah">
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="row mt-5">

                <div class="col-md-2"></div>
                <div class="col-md-8 ftco-animate">
                    <span class="h3">
                        <strong>"{{ $content->judul }}"</strong>
                    </span>
                    <div class="mt-5"></div>
                    <span class="h5">
                    <?php echo $content->content; ?>
                    </span>
                </div>
                <div class="col-md-2"></div>

            </div>
        </div>
    </section>
@endsection
