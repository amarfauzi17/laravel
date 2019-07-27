<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/fonts.googleapis.com.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/ace-skins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/ace-rtl.min.css')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    @yield("css")
</head>
<body class="no-skin">
    @include('admin.partials.nav')
    <div class="main-container ace-save-state" id="main-container">
        @include('admin.partials.sidebar')
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="{{ route('admin.dashboard.index') }}">Dasboard</a>
                        </li>
                        <li class="active">@yield('title')</li>
                    </ul><!-- /.breadcrumb -->
                </div>
                <div class="page-content">
                    @include('admin.partials.menu')
                    @include('admin.partials.info')
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
    <script src="{{asset('admin/assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/ace-extra.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery-ui.custom.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.sparkline.index.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.flot.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.flot.pie.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/ace-elements.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/ace.min.js')}}"></script>
    <script src="{{asset('admin/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js" type="text/javascript"></script>  
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement)
            document.write("<script src="{{asset('admin/assets/js/jquery.mobile.custom.min.js')}}">" + "<" + "/script>");
    </script>
    @yield('js')
</body>
</html>