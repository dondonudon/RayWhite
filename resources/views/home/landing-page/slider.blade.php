<section class="ftco-section ftco-agent goto-here mt-5" id="promo">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">NEWS</span>
                <h2 class="mb-4">Welcome to RayWhite Semarang Candi</h2>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md">
{{--                <div id="slider_section" style="width: 100%;">--}}
{{--                    @foreach($info['image-slider'] as $i)--}}
{{--                        <div><img src="{{ url('storage/'.$i->filename) }}"></div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                <div class="owl-carousel" id="sliderHome">
                    @foreach($info['image-slider'] as $i)
                        <div>
                            <img src="{{ url('storage/'.$i->filename) }}" alt="{{ $i->filename }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
