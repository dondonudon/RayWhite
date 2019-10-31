<script src="{{ asset('home/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('home/js/popper.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('home/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('home/js/aos.js') }}"></script>
<script src="{{ asset('home/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('home/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('home/js/scrollax.min.js') }}"></script>
<script src="{{ asset('home/js/main.js') }}"></script>
{{--<script src="{{ asset('vendor/glide/dist/glide.min.js') }}"></script>--}}
<script src="{{ asset('vendor/slick-1.8.1/slick/slick.min.js') }}"></script>
<script src="{{ asset('vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
<script>
    // new Glide('.glide', {
    //     type: 'carousel',
    //     startAt: 0,
    //     perView: 1,
    //     autoplay: 2000,
    // }).mount()
    function goToSection(id) {
        document.getElementById(id).scrollIntoView({
            behavior: "smooth"
        });
    }

    $(document).ready(function(){
        $('#slider_section').slick({
            arrows: false,
            dots: true,
            autoplay: true,
            centerMode: true,
            variableWidth: true,
        });
        $("#sliderDetailRumah").owlCarousel({
            items: 1,
            loop: true,
            center: true,
            margin: 10,
            responsive:{
                0: {
                    items:1
                },
                480:{
                    items:3
                },
                768:{
                    items:3,
                    loop: false,
                }
            }
        });
        $("#sliderHome").owlCarousel({
            items: 1,
            nav: true,
            loop: true,
            center: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                0: {
                    items:1
                },
                480:{
                    items:2
                },
                768:{
                    items:2
                }
            }
        });
    });
</script>
