@php
$segment = request()->segments();
@endphp
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <a class="navbar-brand" href="{{ url('/') }}" style="position: absolute; top: -10px">
            <img class="img-fluid" src="{{ asset('home/images/rw-logo-2017.jpg') }}" alt="logo" width="65%">
        </a>


        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @if(!isset($segment[0]))
                    <li class="nav-item" style="background-color: yellow">
                        <a href="#promo" class="nav-link">Promo</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="#aboutUs" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="#quote" class="nav-link">Quote</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="#topLister" class="nav-link">Top Lister</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="#topMarketer" class="nav-link">Top Marketer</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="#favoriteMarketer" class="nav-link">Favorite Marketer</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('our-team') }}" class="nav-link">Our Team</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('aktivitas-kita') }}" class="nav-link">Our Activity</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('rumah-dijual') }}" class="nav-link">For Sale</a>
                    </li>
                @else
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('/#promo') }}" class="nav-link">Promo</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('/#aboutUs') }}" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('/#quote') }}" class="nav-link">Quote</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('/#topLister') }}" class="nav-link">Top Lister</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('/#topMarketer') }}" class="nav-link">Top Marketer</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('/#favoriteMarketer') }}" class="nav-link">Favorite Marketer</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('our-team') }}" class="nav-link">Our Team</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('aktivitas-kita') }}" class="nav-link">Our Activity</a>
                    </li>
                    <li class="nav-item" style="background-color: yellow">
                        <a href="{{ url('rumah-dijual') }}" class="nav-link">For Sale</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
