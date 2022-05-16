<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')-Emart</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('assets/backend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/backend/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/morrisjs/morris.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/backend/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/sweetalert/sweetalert.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/backend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/color_skins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/summernote/summernote.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/bootstrap4-toggle/css/bootstrap4-toggle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/sweetalert2/sweetalert2.css')}}">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>  --}}
    @stack('css')
</head>

<body class="theme-cyan">

    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{asset('../assets/backend/images/logo-icon.svg')}}" width="48" height="48"
                    alt="Lucid"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <div id="wrapper">
       @include('backend.layouts.nav')
       @include('backend.layouts.sidebar')
        
       <div id="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

<script src="{{asset('assets/backend/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/backend/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/backend/bundles/morrisscripts.bundle.js')}}"></script>
<script src="{{asset('assets/backend/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/backend/bundles/knob.bundle.js')}}"></script>
<script src="{{asset('assets/backend/js/index8.js')}}"></script>
<script src="{{asset('assets/backend/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/backend/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/sweetalert/sweetalert.min.js')}}"></script> 
<script src="{{asset('assets/backend/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/backend/vendor/summernote/summernote.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap4-toggle/js/bootstrap4-toggle.js')}}"></script>
<script src="{{asset('assets/backend/vendor/sweetalert2/sweetalert2.js')}}"></script>
<script>
    setTimeout(function(){
        $('#alert').slideUp();
    },4000);
</script>
    @stack('js')
</body>

</html>
