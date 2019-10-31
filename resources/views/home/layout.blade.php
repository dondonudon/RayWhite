<!DOCTYPE html>
<html lang="en">
<head>
    @include('home._partials.head')
</head>
<body>

@include('home._partials.navbar')

@include('home.landing-page.hero-section')
@include('home.landing-page.slider')
@include('home.landing-page.about-us')
{{--@include('home.landing-page.quote-of-the-day')--}}
{{--@include('home.landing-page.top-lister')--}}
{{--@include('home.landing-page.top-marketer')--}}
{{--@include('home.landing-page.favourite-marketer')--}}
{{--@include('home.landing-page.our-team')--}}
@include('home.landing-page.aktivitas-kita')
@include('home.landing-page.rumah-dijual')
@include('home.landing-page.bantu-pasarkan')

@include('home._partials.footer')

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"></circle>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"></circle>
    </svg>
</div>

@include('home._partials.footer-script')
<script>
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

    function shareFacebook(url) {
        let trgtUrl = 'https://www.facebook.com/sharer/sharer.php?u={{ url('rumah-dijual/detail') }}/'+url;
        window.open(trgtUrl);
    }

    function shareMail(body) {
        let trgtSubject = 'Ray White Semarang Candi';
        let trgtBody = encodeURI(body);
        window.open('mailto:your@friends.com?subject='+trgtSubject+'&body='+trgtBody);
    }
</script>

<!-- </body></html> -->
</body>
</html>
