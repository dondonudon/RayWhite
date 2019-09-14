<section class="ftco-section goto-here" id="forSale">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Exclusive Offer For You</h2>
            </div>
        </div>
        <div class="row">
            @foreach($info['rumah-dijual'] as $i)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src="{{ url('storage/'.$i->gambar) }}" class="card-img" alt="{{ $i->nama_rumah }}" >
                        <div class="card-header" style="opacity: .8">
                            <strong>{{ $i->nama_rumah }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col text-truncate">
                                            Price: <strong class="text-gray-dark">Rp {{ number_format($i->harga,2) }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="row mb-3">--}}
{{--                                <div class="col">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col text-truncate">--}}
{{--                                            Marketer:<strong class="text-gray-dark"> {{ $i->marketer }}</strong>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-tiles"></i> LT {{ $i->luas_tanah }} || LB {{ $i->luas_bangunan }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-stairs"></i> {{ $i->lantai }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-hotel"></i> {{ $i->kamar_tidur }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-bathtub-with-opened-shower"></i> {{ $i->kamar_mandi }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-kitchen"></i> {{ $i->dapur_bersih }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-kitchen"></i> {{ $i->dapur_kotor }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-herbal-spa-treatment-leaves"></i> {{ $i->taman }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-compass-with-white-needles"></i> {{ $i->arah_rumah }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-lightning-in-a-circle"></i> {{ $i->listrik }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-truncate">
                                            <i class="flaticon-family-sofa"></i> {{ $i->furniture }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    Share:
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-block btn-outline-info" onclick="shareFacebook()">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-block btn-outline-danger" onclick="shareInstagram()">
                                        <i class="fab fa-instagram"></i>
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-block btn-outline-warning" onclick="shareMail()">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                </div>
                                <div class="col">
                                    <a href="" class="btn btn-block btn-outline-success" data-action="share/whatsapp/share">
                                        <span><i class="fab fa-whatsapp"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a href="" class="btn btn-success btn-block">
                                        <span><i class="fab fa-whatsapp"></i> Contact Us</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="{{ url('rumah-dijual/detail') }}/'+v.id+'" class="btn btn-primary btn-block">
                                        <span class="text-dark">Detail</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
