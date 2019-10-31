{{--<div class="jumbotron jumbotron-fluid" style="height: 100vh">--}}
{{--    <div class="container">--}}

{{--            <div class="glide jumbotron jumbotron-fluid" style="padding: 0rem 0rem;">--}}
{{--                <div class="glide__track" data-glide-el="track">--}}
{{--                    <ul class="glide__slides">--}}
{{--                        @foreach($info['image-slider'] as $i)--}}
{{--                        <li class="glide__slide">--}}
{{--                            <img src="{{ url('storage/'.$i->filename) }}" class="img-fluid" width="100%" alt="Responsive image">--}}
{{--                        </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--    </div>--}}
{{--</div>--}}
<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ url('storage/'.$info['header-section-image']->filename) }}');" data-stellar-background-ratio="0.5">
    <div class="overlay" style="background-color: lightgray; opacity: 0.5;"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6 ftco-animate">
                <div class="text text-center">
                    <h2 class="mb-4"><strong>{{ $info['header-section']['tagline'] }}</strong></h2>
                    <p style="font-size: 18px;">{{ $info['header-section']['deskripsi-singkat'] }}</p>
                    <form action="{{ url('rumah-dijual') }}" class="search-location mt-md-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 align-items-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <input type="text" name="lokasi" class="form-control" placeholder="Search location">
                                        <button><span class="ion-ios-search"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php echo $info['quote-of-the-day']['data'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mouse">
        <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
        </a>
    </div>
</div>
