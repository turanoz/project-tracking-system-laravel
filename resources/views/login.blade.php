<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- TITLE -->
    <title>Kocaeli Üniversitesi - Proje Takip Sistemi | Giriş Yap</title>

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

</head>

<body class="app sidebar-mini ltr">

<!-- BACKGROUND-IMAGE -->
<div class="login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="{{asset('')}}assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="">
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src="{{asset('')}}assets/images/brand/logo.png" width="125px" height="125px"
                         class="header-brand-img" alt="">
                </div>
            </div>

            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <div class="login100-form validate-form">
                        <span class="login100-form-title pb-5">
                                Giriş Yap
                            </span>
                        <div class="panel panel-primary">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul id="ktipTab" class="nav panel-tabs">
                                        <li class="mx-0">
                                            <a href="javascript:void(0)" onclick="degistir(1);" class="active"
                                               data-bs-toggle="tab">Yönetici</a>
                                        </li>
                                        <li class="mx-0">
                                            <a href="javascript:void(0)" onclick="degistir(2);" data-bs-toggle="tab">Danışman</a>
                                        </li>
                                        <li class="mx-0">
                                            <a href="javascript:void(0)" onclick="degistir(3);" data-bs-toggle="tab">Öğrenci</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <input id="type" type="hidden" value="1">
                                        <div class="wrap-input100 validate-input input-group"
                                             data-bs-validate="Lütfen eposta adresi giriniz: ex@kocaeli.edu.tr">
                                            <a href="#" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input id="username" class="input100 border-start-0 form-control ms-0"
                                                   type="email" placeholder="E-posta adresi">
                                        </div>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="#" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input id="password" class="input100 border-start-0 form-control ms-0"
                                                   type="password" placeholder="Şifre">
                                        </div>
                                        <div class="text-end pt-4">
                                            <p class="mb-0"><a href="{{route("forgotpassword")}}" class="text-primary ms-1">Şifreni mi
                                                    unuttun?</a></p>
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <button id="signin" class="login100-form-btn btn-primary">Giriş Yap</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
</div>
    <!-- JQUERY JS -->
    <script src="{{asset('')}}assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('')}}assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{asset('')}}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('')}}assets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{asset('')}}assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('')}}assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="{{asset('')}}assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('')}}assets/js/custom.js"></script>


    <script>
        function degistir(degistir) {
            document.querySelector("#type").value = degistir;
        }
    </script>
    <!-- INTERNAL Notifications js -->
    <script src="{{asset("")}}assets/plugins/notify/js/rainbow.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/notifIt.js"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                $('#password').keypress(function(e){
                    if(e.keyCode==13)
                        $('#signin').click();
                });

            $("#signin").click(function (e) {
                e.preventDefault();
                let username = $('#username').val();
                let password = $('#password').val();
                let type = $('#type').val();
                $.ajax({
                    type: "post",
                    url: "{{route('loginpost')}}",
                    data: {
                        username: username,
                        password: password,
                        type: type,
                    },
                    success: function (data) {
                        console.log(data);
                        if(data["type"]=="success"){
                            setTimeout(function (){
                                window.location.href=data['url'];
                            },2000)
                        }
                        notif(data);

                    }
                });

            });
        });
    </script>

</body>

</html>
