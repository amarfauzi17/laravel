<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="The News Reporter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link href="{{asset('css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
    <div class="container">	
        <div class="news-paper">
            @include('theme.partials.nav')
            @include('theme.partials.info')
            @yield('content')
            @include('theme.partials.sidebar')
            @include('theme.partials.footer')
        </div>
    </div>
    <!-- Custom Theme files -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.leanModal.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
    <script type="application/x-javascript"> 
        addEventListener("load", function() { 
            setTimeout(hideURLbar, 0); 
        }, false); 
        function hideURLbar(){ 
            window.scrollTo(0,1); 
        }
        $("#modal_trigger").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
        $(function () {
            $("#login_form").click(function () {
                $(".social_login").hide();
                $(".user_login").show();
                return false;
            });
            $("#register_form").click(function () {
                $(".social_login").hide();
                $(".user_register").show();
                $(".header_title").text('Register');
                return false;
            });
            $(".back_btn").click(function () {
                $(".user_login").hide();
                $(".user_register").hide();
                $(".social_login").show();
                $(".header_title").text('Login');
                return false;
            });
        });

        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });

        $("span.menu").click(function () {
            $(".menu-strip").slideToggle("slow", function () {
            });
        });
    </script>
    @yield("scripts")
</body>
</html>
