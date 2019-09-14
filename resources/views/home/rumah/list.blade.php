@extends('home.rumah.layout')

@section('content')
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('{{ url('storage/'.$info['header-section']['filename']) }}');" data-stellar-background-ratio="0.5">
        <div class="overlay" style="background-color: lightgray; opacity: 0.5;"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Exclusive Offer For You</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-md-last ftco-animate">
                    <div class="row" id="listRumah">
                        <div class="col text-center">
                            <i class="fas fa-spinner fa-3x fa-pulse"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 sidebar ftco-animate">
{{--                    <div class="sidebar-box">--}}
{{--                        <form action="#" class="search-form">--}}
{{--                            <div class="form-group">--}}
{{--                                <span class="icon icon-search"></span>--}}
{{--                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Filter</h3>
                            <li>
                                <div class="form-group">
                                    <label for="filterArea">Area</label>
                                    <select class="form-control" name="filter_area" id="filterArea">
                                        <option value="all">All</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="filterMarketer">Marketing</label>
                                    <select class="form-control" name="filter_marketer" id="filterMarketer">
                                        <option value="all">All</option>
                                        @foreach($filter['marketer'] as $f)
                                            <option value="{{ $f->id }}">{{ $f->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="filterJualSewa">Jual atau Sewa</label>
                                    <select class="form-control" name="filter_jualsewa" id="filterJualSewa">
                                        <option value="all">All</option>
                                        <option value="jual">Jual</option>
                                        <option value="Sewa">Sewa</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="filterMinPrice">Range Harga</label>
                                    <input type="text" class="form-control" id="filterMinPrice" placeholder="Min">
                                    <input type="text" class="form-control mt-2" id="filterMaxPrice" placeholder="Max">
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="filterProperti">Jenis Property</label>
                                    <select class="form-control" name="filter_properti" id="filterProperti">
                                        <option value="all">All</option>
                                        <option value="rumah">Rumah</option>
                                        <option value="ruko">Ruko</option>
                                    </select>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const filterArea = document.getElementById('filterArea');
        const filterMarketer = document.getElementById('filterMarketer');
        const filterJualSewa = document.getElementById('filterJualSewa');
        const filterMinPrice = document.getElementById('filterMinPrice');
        const filterMaxPrice = document.getElementById('filterMaxPrice');
        const filterProperti = document.getElementById('filterProperti');

        const listArea = document.getElementById('listRumah');

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1112188365645738',
                cookie     : true,
                xfbml      : true,
                version    : 'v4.0'
            });

            FB.AppEvents.logPageView();

        };

        function shareFacebook(url) {
            FB.ui({
                method: 'share',
                href: url
            }, function(response){});
        }

        function shareInstagram(url) {
            let targetUrl = encodeURI('https://api.instagram.com/oauth/authorize/?client_id=be919e566abd435aac05577e0344921d&redirect_uri=http://raywhitesemarangcandi.com&response_type=code');
            window.open(targetUrl,'Share to Instagram');
        }

        function shareMail(subject,body) {
            let trgtSubject = encodeURI(subject);
            let trgtBody = encodeURI(body);
            window.open('mailto:your@friends.com?subject='+trgtSubject+'&body='+trgtBody);
        }

        function showLoading() {
            listArea.innerHTML = '<div class="col text-center"><i class="fas fa-spinner fa-3x fa-pulse"></i></div>';
        }

        function getRumah() {
            let Area = filterArea.value;
            let Marketer = filterMarketer.value;
            let JualSewa = filterJualSewa.value;
            let MinPrice = filterMinPrice.value;
            let MaxPrice = filterMaxPrice.value;
            let Properti = filterProperti.value;

            $.ajax({
                url: '{{ url('rumah-dijual/get-data') }}',
                method: 'post',
                data: {
                    area: Area,
                    marketer: Marketer,
                    jual_sewa: JualSewa,
                    min_price: MinPrice,
                    max_price: MaxPrice,
                    properti: Properti
                },
                success: function(response) {
                    try {
                        let htmlData = '';
                        let data = JSON.parse(response);
                        console.log(data);
                        data.forEach(function(v,i) {
                            htmlData += '<div class="col-md-6 mb-5">\n' +
                                '                                <div class="card">\n' +
                                '                                    <img src="{{ url('storage') }}/'+v.gambar+'" class="card-img" alt="'+v.nama_rumah+'" >\n' +
                                '                                    <div class="card-header" style="opacity: .8">\n' +
                                '                                        <strong>'+v.nama_rumah+'</strong>\n' +
                                '                                    </div>\n' +
                                '                                    <div class="card-body">\n' +
                                '                                        <div class="row mb-3">\n' +
                                '                                            <div class="col">\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        Price: <strong class="text-gray-dark">Rp '+numeral(v.harga).format(	'0,0.00')+'</strong>\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="row mb-3">\n' +
                                '                                            <div class="col">\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        Marketer:<strong class="text-gray-dark"> '+v.marketer+'</strong>\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="row">\n' +
                                '                                            <div class="col-md-6">\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-tiles"></i> LT '+v.luas_tanah+' || LB '+v.luas_bangunan+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-stairs"></i> '+v.lantai+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-hotel"></i> '+v.kamar_tidur+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-bathtub-with-opened-shower"></i> '+v.kamar_mandi+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-kitchen"></i> '+v.dapur_bersih+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col-md-6">\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-kitchen"></i> '+v.dapur_kotor+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-herbal-spa-treatment-leaves"></i> '+v.taman+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-compass-with-white-needles"></i> '+v.arah_rumah+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-lightning-in-a-circle"></i> '+v.listrik+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                                <div class="row">\n' +
                                '                                                    <div class="col text-truncate">\n' +
                                '                                                        <i class="flaticon-family-sofa"></i> '+v.furniture+'\n' +
                                '                                                    </div>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="row mt-2">\n' +
                                '                                            <div class="col">\n' +
                                '                                                Share:\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <button type="button" class="btn btn-block btn-outline-info" onclick="shareFacebook()">\n' +
                                '                                                    <i class="fab fa-facebook-f"></i>\n' +
                                '                                                </button>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <button type="button" class="btn btn-block btn-outline-danger" onclick="shareInstagram()">\n' +
                                '                                                    <i class="fab fa-instagram"></i>\n' +
                                '                                                </button>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <button type="button" class="btn btn-block btn-outline-warning" onclick="shareMail()">\n' +
                                '                                                    <i class="fas fa-envelope"></i>\n' +
                                '                                                </button>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <a href="" class="btn btn-block btn-outline-success" data-action="share/whatsapp/share">\n' +
                                '                                                    <span><i class="fab fa-whatsapp"></i></span>\n' +
                                '                                                </a>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                    <div class="card-footer">\n' +
                                '                                        <div class="row">\n' +
                                '                                            <div class="col">\n' +
                                '                                                <a href="" class="btn btn-success btn-block">\n' +
                                '                                                    <span><i class="fab fa-whatsapp"></i> Contact Us</span>\n' +
                                '                                                </a>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <a href="{{ url('rumah-dijual/detail') }}/'+v.id+'" class="btn btn-primary btn-block">\n' +
                                '                                                    <span class="text-dark">Detail</span>\n' +
                                '                                                </a>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                </div>\n' +
                                '                            </div>';
                        });
                        listArea.innerHTML = htmlData;
                    } catch (e) {
                        return response;
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            getRumah();
            filterArea.addEventListener('change',function() {
                showLoading();
                getRumah();
            });
            filterMarketer.addEventListener('change',function() {
                showLoading();
                getRumah();
            });
            filterJualSewa.addEventListener('change',function() {
                showLoading();
                getRumah();
            });
            filterMinPrice.addEventListener('keyup',function() {
                showLoading();
                getRumah();
            });
            filterMaxPrice.addEventListener('keyup',function() {
                showLoading();
                getRumah();
            });
            filterProperti.addEventListener('change',function() {
                showLoading();
                getRumah();
            });
        })
    </script>
@endsection
