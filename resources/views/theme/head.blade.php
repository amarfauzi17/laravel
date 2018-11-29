<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet" media="all" />
        <!-- Custom Theme files -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.leanModal.min.js')}}"></script>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
        <link href="{{asset('css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <script src="{{asset('js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html"/>
        <meta name="keywords" content="The News Reporter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->

    </head>
    <body>
        <div class="container">	
            <div class="news-paper">
                @include('theme.nav')
                @include('theme.info')
                @yield('content')
                @include('theme.sidebar')
                @include('theme.footer')
            </div>
        </div>
    </body>
</html>
