<section class="ftco-section ftco-agent goto-here" id="topMarketer">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">MARKETER</span>
                <h2 class="mb-4">Top Marketer</h2>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @foreach($info['top-marketer'] as $t)
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="{{ url('storage/'.$t->photo) }}" class="img-fluid" alt="{{ $t->fullname }}">
                        </div>
                        <div class="desc text-center" style="background-color: transparent">
                            <h3>{{ $t->fullname }}</h3>
{{--                            <p class="h-info"><span class="location">{{ $t['jabatan'] }}</span></p>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
