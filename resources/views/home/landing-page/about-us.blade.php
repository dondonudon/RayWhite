<section class="ftco-section goto-here" id="aboutUs">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center">
                <img src="{{ $info['about-us']['filename'] }}" class="img-fluid" alt="about-us">
            </div>
            <div class="col-md-6 wrap-about py-md-5 ftco-animate">
                <div class="heading-section p-md-5">
                    <h2 class="mb-4">About us</h2>

                    <?php echo $info['about-us']['data'] ?>
                </div>
            </div>
        </div>
    </div>
</section>
