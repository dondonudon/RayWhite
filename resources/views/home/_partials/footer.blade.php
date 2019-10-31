<?php
$segments = request()->segments();
?>
<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-8">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 mb-2"><b>{{ config('app.app_name') }}</b></h2>
                    @if(isset($segments[0]))
                        @if($segments[0] == 'rumah-dijual')
                            @if(isset($segments[1]))
                                <p class="mb-5">{{ $info['header-section']['deskripsi-singkat'] }}</p>
                            @else
                                <p>{{ $info['header-section']['data'] }}</p>
                            @endif
                        @else
{{--                            <p>{{ $info['header-section']['deskripsi-singkat'] }}</p>--}}
                        @endif
                    @else
                        <p>{{ $info['header-section']['deskripsi-singkat'] }}</p>
                    @endif


                    <h2 class="ftco-heading-2 mb-2"><b>Jam Kerja: </b></h2>
                    <p class="mb-5">09:00 - 17:00</p>
{{--                    <ul class="ftco-footer-social list-unstyled mt-5">--}}
{{--                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>--}}
{{--                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>--}}
{{--                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>--}}
{{--                    </ul>--}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 mb-2">Butuh bantuan? Ada pertanyaan? Wa admin</h2>
                    <a class="btn btn-success text-white mb-5" href="https://wa.me/628112768789?text={{ urlencode('Saya butuh bantuan anda') }}">
                        <i class="fab fa-whatsapp"></i> Contact Us
                    </a>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <i class="fas fa-map-marked-alt"></i>
                                <span class="ml-3"> {{ $info['contact-us']['alamat'] }}</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span class="ml-3"> {{ $info['contact-us']['no_telp'] }}</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span class="ml-3"> {{ $info['contact-us']['email'] }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 text-left">
                <p>
                    <i class="fa fa-copyright"></i> {{ date('Y') }}
                    {{ config('app.app_name') }}
                </p>
            </div>
            <div class="col-md-6 text-lg-right text-sm-left">
                <p>
                    Developed by
                    <a href="https://waveitsolution.com" target="_blank">
                        <span style="color: blue">WAVE Solusi Indonesia</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
<div class="container-fluid" style="background-color: #ffe512; height: 10px;"></div>
