<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- TITLE -->
    <title>@yield('title')</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('')}}assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- STYLE CSS -->
    <link href="{{asset('')}}assets/css/style.css" rel="stylesheet"/>
    <link href="{{asset('')}}assets/css/dark-style.css" rel="stylesheet"/>
    <link href="{{asset('')}}assets/css/transparent-style.css" rel="stylesheet">
    <link href="{{asset('')}}assets/css/skin-modes.css" rel="stylesheet"/>
    <!--- FONT-ICONS CSS -->
    <link href="{{asset('')}}assets/css/icons.css" rel="stylesheet"/>
    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('')}}assets/colors/color1.css"/>

    @yield('stil')

</head>
@php($url = explode("/", $_SERVER['REQUEST_URI']))
@if($url[1]=="401")
    @yield('content')
@else
<body class="app sidebar-mini ltr">
{{--<!-- GLOBAL-LOADER -->--}}
<div id="global-loader">
    <img src="{{asset('')}}assets/images/loader.svg" class="loader-img" alt="Loader">
</div>

<!-- PAGE -->
<div class="page">
    <div class="page-main">
        @include('layouts.data.head')
        @include('layouts.data.nav')
        @yield('content')
        @include('layouts.data.footer')
    </div>

</div>
@endif

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="{{asset('')}}assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('')}}assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('')}}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SIDE-MENU JS -->
<script src="{{asset('')}}assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="{{asset('')}}assets/plugins/sidebar/sidebar.js"></script>

<!-- Color Theme js -->
<script src="{{asset('')}}assets/js/themeColors.js"></script>

<!-- Sticky js -->
<script src="{{asset('')}}assets/js/sticky.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('')}}assets/js/custom.js"></script>

<script>
    $(".bildirim").click(function (e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var bildirim_id=this.getAttribute("data-id");
        $.ajax({
            type: "post",
            url: "{{route("studentnotificationeyes")}}",
            data: {
                bildirim_id: bildirim_id,
            }
        });
    });
</script>

@yield('js')
</body>

</html>
