<section class="ftco-section goto-here" id="aboutUs">
    <div class="container">
{{--        <div class="row no-gutters">--}}
{{--            <div class="col-md-6 p-md-3 img d-flex justify-content-center align-items-center" >--}}
{{--                <img src="{{ $info['about-us']['filename'] }}" class="img-fluid" alt="about-us">--}}
{{--            </div>--}}
{{--            <div class="col-md-6 wrap-about py-md-5 ftco-animate">--}}
{{--                <div class="heading-section p-md-3">--}}
{{--                    <h2 class="mb-4">About us</h2>--}}

                    <?php
//                    echo $info['about-us']['data']
                    ?>
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="card bg-dark text-white">
            <img src="{{ $info['about-us']['filename'] }}" class="card-img" alt="about-us" style="opacity: 0.7;">
            <div class="card-img-overlay">
                <h2 class="mb-4 mt-5 text-white">About us</h2>
                <?php echo $info['about-us']['data'] ?>
            </div>
        </div>
    </div>
</section>
