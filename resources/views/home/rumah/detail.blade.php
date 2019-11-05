@extends('home.rumah.layout')

@section('style')
    <style>
        .jumbotron {
            /*color: white;*/
            background-image: url("{{ url('storage/'.$content->gambar) }}");
            box-shadow: inset 0 0 0 1000px rgba(255, 255, 255, 0.74);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 35vh;
        }
    </style>
@endsection

@section('content')
{{--    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('{{ url('storage/'.$content->gambar) }}');" data-stellar-background-ratio="0.5">--}}
{{--        <div class="overlay" style="background-color: lightgray; opacity: 0.5;"></div>--}}
{{--        <div class="container">--}}
{{--            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">--}}
{{--                <div class="col-md-9 ftco-animate pb-5 text-center">--}}
{{--                    --}}{{--                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span>--}}
{{--                    --}}{{--                </p>--}}
{{--                    <h4 class="mb-3 bread">About This Property</h4>--}}
{{--                    <h1>{{ $content->nama_rumah }}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="mt-sm-5 text-center">FOR SALE</h1>
        </div>
    </div>

    <section class="ftco-section ftco-property-details pt-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="property-details">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <div class="owl-carousel" id="sliderDetailRumah">
                                    <div>
                                        <img class="d-block w-100" src="{{ url('storage/'.$content->gambar) }}" alt="gambar-rumah" style="height: 50%">
                                    </div>
                                    @foreach($listGambar as $l)
                                        <div>
                                            <img src="{{ url('storage/'.$l->gambar) }}" class="img-fluid" alt="gambar"  style="height: 50%">
                                        </div>
                                    @endforeach
                                </div>
{{--                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 75%">--}}
{{--                                    <ol class="carousel-indicators">--}}
{{--                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
{{--                                        @for($i=0;$i<count($listGambar);$i++)--}}
{{--                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i+1 }}"></li>--}}
{{--                                        @endfor--}}
{{--                                    </ol>--}}
{{--                                    <div class="carousel-inner">--}}
{{--                                        <div class="carousel-item active">--}}
{{--                                            <img class="d-block w-100" src="{{ url('storage/'.$content->gambar) }}" alt="gambar-rumah">--}}
{{--                                        </div>--}}
{{--                                        @foreach($listGambar as $l)--}}
{{--                                            <div class="carousel-item">--}}
{{--                                                <img src="{{ url('storage/'.$l->gambar) }}" class="d-block w-100" alt="gambar">--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
{{--                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                                        <span class="sr-only">Previous</span>--}}
{{--                                    </a>--}}
{{--                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
{{--                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                                        <span class="sr-only">Next</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="text text-center">
                            <h1>{{ $content->nama_rumah }}</h1>
                            <h4>Rp {{ number_format($content->harga,2) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="features">
                                            <li class="check">
                                                <span class="flaticon-tiles"></span>Bangunan: LT {{ $content->luas_tanah }} || LB {{ $content->luas_bangunan }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-stairs"></span>Lantai: {{ $content->lantai }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-hotel"></span>Kamar Tidur: {{ $content->kamar_tidur }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-bathtub-with-opened-shower"></span>Kamar Mandi: {{ $content->kamar_mandi }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-kitchen"></span>Dapur Bersih: {{ $content->dapur_bersih }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="features">
                                            <li class="check">
                                                <span class="flaticon-kitchen"></span>Dapur Kotor: {{ $content->dapur_kotor }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-herbal-spa-treatment-leaves"></span>Taman: {{ $content->taman }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-compass-with-white-needles"></span>Hadap Rumah: {{ $content->arah_rumah }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-lightning-in-a-circle"></span>Listrik: {{ $content->listrik }}
                                            </li>
                                            <li class="check">
                                                <span class="flaticon-family-sofa"></span>Furniture: {{ $content->furniture }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <h5>Lokasi:</h5>
                                <p>{{ $content->lokasi }}</p>
                                <?php echo $content->detail; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
