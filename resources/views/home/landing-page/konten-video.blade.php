<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">ABOUT US</span>
                <h2>Our Activity</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-md-center">
            @foreach($info['konten-video'] as $a)
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $a->url }}" allowfullscreen></iframe>
                            </div>
                            <h3 class="heading mt-1">
                                <a href="{{ url('aktivitas-kita/'.$a->id) }}">
                                    <div class="row">
                                        <div class="col text-truncate" style="font-weight: bold">
                                            {{ $a->judul }}
                                        </div>
                                    </div>
                                </a>
                            </h3>
                            <div class="meta mb-3">
                                <div><a href="{{ url('aktivitas-kita/'.$a->id) }}">{{ $a->created_at }}</a></div>
                                <div><a href="{{ url('aktivitas-kita/'.$a->id) }}">{{ $a->username }}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
