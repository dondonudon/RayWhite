<section class="ftco-section ftco-agent goto-here" id="topLister">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">LISTER</span>
                <h2 class="mb-4">Top Lister</h2>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @foreach($info['top-lister'] as $t)
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="{{ url('storage/'.$t->photo) }}" class="img-fluid" alt="{{ $t->fullname }}">
                        </div>
                        <div class="desc text-center" style="background-color: transparent;">
                            <h3>{{ $t->fullname }}</h3>
{{--                            <p class="h-info"><span class="location">{{ $t['jabatan'] }}</span></p>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
