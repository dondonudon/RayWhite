@extends('home.rumah.layout')

@section('style')
    <style>
        .jumbotron {
            /*color: white;*/
            background-image: url("{{ url('storage/'.$info['header-section']['filename']) }}");
            box-shadow: inset 0 0 0 1000px rgba(255, 255, 255, 0.74);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 35vh;
        }
    </style>
@endsection

@section('content')
{{--    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('{{ url('storage/'.$info['header-section']['filename']) }}');" data-stellar-background-ratio="0.5">--}}
{{--        <div class="overlay" style="background-color: lightgray; opacity: 0.5;"></div>--}}
{{--        <div class="container">--}}
{{--            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">--}}
{{--                <div class="col-md-9 ftco-animate pb-5 text-center">--}}
{{--                    <h1 class="mb-3 bread">Exclusive Offer For You</h1>--}}
{{--                    <h2 class="mb-3 bread">--}}
{{--                        Portal Properti Indonesia--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="mt-sm-5 text-center" style="color: #575D5A">FOR SALE</h1>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg pt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header"
                                         id="headingOne"
                                         data-toggle="collapse"
                                         data-target="#collapseOne"
                                         aria-expanded="true"
                                         aria-controls="collapseOne"
                                         style="background-color: #FBE60F"
                                    >
                                        <h3
                                            class="mb-0"
                                            style="color: #585766; font-weight: bold;"
                                        >Filter Pencarian</h3>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <li>
                                                <div class="form-group">
                                                    <label for="lokasiRumah">Lokasi Rumah</label>
                                                    <input type="text" class="form-control" id="lokasiRumah" placeholder="Lokasi Rumah" value="{{ (isset(request()->lokasi))?request()->lokasi:'' }}">
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
                                                    <label for="filterMinLuas">Luas Rumah</label>
                                                    <input type="text" class="form-control" id="filterMinLuas" placeholder="Min">
                                                    <input type="text" class="form-control mt-2" id="filterMaxLuas" placeholder="Max">
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
                                            <li>
                                                <div class="form-group">
                                                    <label for="filterHadap">Hadap Rumah</label>
                                                    <select class="form-control" name="filter_hadap" id="filterHadap">
                                                        <option value="all">All</option>
                                                        <option value="timur">Timur</option>
                                                        <option value="tenggara">Tenggara</option>
                                                        <option value="selatan">Selatan</option>
                                                        <option value="barat_daya">Barat Daya</option>
                                                        <option value="barat">Barat</option>
                                                        <option value="barat_laut">Barat Laut</option>
                                                        <option value="utara">Utara</option>
                                                        <option value="timur_laut">Timur Laut</option>
                                                    </select>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-8 order-md-last ftco-animate">
                    <div class="row" id="listRumah">
                        <div class="col text-center">
                            <i class="fas fa-spinner fa-3x fa-pulse"></i>
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

        const filterLokasi = document.getElementById('lokasiRumah');
        const filterMarketer = document.getElementById('filterMarketer');
        const filterJualSewa = document.getElementById('filterJualSewa');
        const filterMinPrice = document.getElementById('filterMinPrice');
        const filterMaxPrice = document.getElementById('filterMaxPrice');
        const filterMinLuas = document.getElementById('filterMinLuas');
        const filterMaxLuas = document.getElementById('filterMaxLuas');
        const filterProperti = document.getElementById('filterProperti');
        const filterHadap = document.getElementById('filterHadap');

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
            let trgtUrl = 'https://www.facebook.com/sharer/sharer.php?u={{ url('rumah-dijual/detail') }}/'+url;
            window.open(trgtUrl);
        }

        function shareWhatsapp(check,id) {
            let url;
            if (check === 'share') {
                let encode = encodeURI('{{ url('rumah-dijual/detail') }}/'+id+'\n Silahkan cek rumah ini. Ray White Semarang Candi');
                url = 'https://api.whatsapp.com/send?phone=&text='+encode;
            } else {
                let encode = encodeURI('{{ url('rumah-dijual/detail') }}/'+id+'\n Saya tertarik dengan rumah ini. Hubungi saya secepatnya. Ray White Semarang Candi');
                url = 'https://api.whatsapp.com/send?phone=628112768789&text='+encode;
            }

            window.open(url);
        }

        function shareInstagram(url) {
            let targetUrl = encodeURI('https://api.instagram.com/oauth/authorize/?client_id=be919e566abd435aac05577e0344921d&redirect_uri=http://raywhitesemarangcandi.com&response_type=code');
            window.open(targetUrl,'Share to Instagram');
        }

        function shareMail(body) {
            let trgtSubject = 'Ray White Semarang Candi';
            let trgtBody = encodeURI(body);
            window.open('mailto:your@friends.com?subject='+trgtSubject+'&body='+trgtBody);
        }

        function showLoading() {
            listArea.innerHTML = '<div class="col text-center"><i class="fas fa-spinner fa-3x fa-pulse"></i></div>';
        }

        function getRumah() {
            let Lokasi = filterLokasi.value;
            let Marketer = filterMarketer.value;
            let JualSewa = filterJualSewa.value;
            let MinPrice = filterMinPrice.value;
            let MaxPrice = filterMaxPrice.value;
            let MinLuas = filterMinLuas.value;
            let MaxLuas = filterMaxLuas.value;
            let Properti = filterProperti.value;
            let Hadap = filterHadap.value;

            $.ajax({
                url: '{{ url('rumah-dijual/get-data') }}',
                method: 'post',
                data: {
                    lokasi: Lokasi,
                    marketer: Marketer,
                    jual_sewa: JualSewa,
                    min_price: MinPrice,
                    max_price: MaxPrice,
                    min_luas: MinLuas,
                    max_luas: MaxLuas,
                    properti: Properti,
                    hadap: Hadap,
                },
                success: function(response) {
                    try {
                        let htmlData = '';
                        let data = JSON.parse(response);
                        // console.log(data);
                        data.forEach(function(v,i) {
                            let url = '{{ url("rumah-dijual/detail") }}/'+v.id;
                            htmlData += '<div class="col-md-6 mb-5">\n' +
                                '<div class="card" onclick="window.location.href =\''+url+'\'">\n' +
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
                                '                                       <div class="row mb-3">\n' +
                                '                                           <div class="col">\n' +
                                '                                               <div class="row">\n' +
                                '                                                   <div class="col text-truncate">\n' +
                                '                                                       Lokasi: <strong class="text-gray-dark">'+v.lokasi+'</strong>\n' +
                                '                                                   </div>\n' +
                                '                                               </div>\n' +
                                '                                           </div>\n' +
                                '                                       </div>'+
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
                                '                                            <div class="col-12">\n' +
                                '                                                Share:\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <button type="button" class="btn btn-block btn-outline-info" onclick="shareFacebook('+v.id+')">\n' +
                                '                                                    <i class="fab fa-facebook-f"></i>\n' +
                                '                                                </button>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <button type="button" class="btn btn-block btn-outline-danger" onclick="shareMail('+v.id+')">\n' +
                                '                                                    <i class="fas fa-envelope"></i>\n' +
                                '                                                </button>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="col">\n' +
                                '                                                <button type="button" class="btn btn-block btn-outline-success" onclick="shareWhatsapp(\'share\','+v.id+')">\n' +
                                '                                                    <i class="fab fa-whatsapp"></i>\n' +
                                '                                                </button>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                    <div class="card-footer">\n' +
                                '                                        <div class="row">\n' +
                                '                                            <div class="col">\n' +
                                '                                                <button type="button" class="btn btn-block btn-success" onclick="shareWhatsapp(\'info\','+v.id+')">\n' +
                                '                                                    <i class="fab fa-whatsapp"></i> Contact Us\n' +
                                '                                                </button>\n' +
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
                        console.log(response);
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            getRumah();
            filterLokasi.addEventListener('keyup',function() {
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
            filterHadap.addEventListener('change',function() {
                showLoading();
                getRumah();
            });
            filterMinLuas.addEventListener('change',function() {
                showLoading();
                getRumah();
            });
            filterMaxLuas.addEventListener('change',function() {
                showLoading();
                getRumah();
            });
        })
    </script>
@endsection
