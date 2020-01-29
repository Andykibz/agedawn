<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link href="{{ asset('fonts/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    
    

     
</head>
<body style="">
    <div class="" style="height:100%">
        @yield('content')

    </div>

<!-- Scripts -->
<script src="{{ asset('js/script.js') }}" ></script>
<script src="{{ asset('js/jquery-migrate.js') }}" defer></script>   
<script src="{{ asset('js/stellar.js') }}" defer></script>   
<script src="{{ asset('js/slick.js') }}" defer></script>   

    <script type="text/javascript">

   jQuery(document).ready(function() {
    
       var siteStellar = function() {
           $(window).stellar({
           responsive: false,
           parallaxBackgrounds: true,
           parallaxElements: true,
           horizontalScrolling: false,
           hideDistantElements: false,
           scrollProperty: 'scroll'
         });
       };
       siteStellar();
       
       $('.albums').slick({
            dots: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            //    vertical: true,
            verticalSwiping: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000,
            prevArrow: $('.prev_alb'),
            nextArrow: $('.next_alb'),
       });
       $('.prev_alb').click(function(){
            $('.albums').slick('slickPrev');
        })

        $('.next_alb').click(function(){
            $('.albums').slick('slickNext');
        })
   });
   
</script>
    
</body>
</html>
