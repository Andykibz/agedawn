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
    <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3/dist/vue-loading.css" rel="stylesheet">
         
</head>
<body style="">
    <div class="" style="height:100%">
        @yield('content')

    </div>

<script src="{{ asset('js/script.js') }}" ></script>
<script src="{{ asset('js/jquery-migrate.js') }}" defer></script>   
<script src="{{ asset('js/stellar.js') }}" defer></script>   

    <script type="text/javascript">

   jQuery(document).ready(function() {
    
       window.siteStellar = function() {
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
       
       
   });
   
   
</script>
</body>
</html>
