<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Kocaeli Üniversitesi - Proje Takip Sistemi | Şifremi Unuttum</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('')}}assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('')}}assets/css/style.css" rel="stylesheet" />
    <link href="{{asset('')}}assets/css/dark-style.css" rel="stylesheet" />
    <link href="{{asset('')}}assets/css/transparent-style.css" rel="stylesheet">
    <link href="{{asset('')}}assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('')}}assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('')}}assets/colors/color1.css" />

</head>

<body class="app sidebar-mini ltr">

<!-- BACKGROUND-IMAGE -->
<div class="login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="{{asset('')}}assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- End GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="">

            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto">
                <div class="text-center">
                    <img src="{{asset('')}}assets/images/brand/logo.png" width="125px" height="125px"
                         class="header-brand-img" alt="">
                </div>
            </div>

            <!-- CONTAINER OPEN -->
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <div class="login100-form validate-form">
                            <span class="login100-form-title pb-5">
                                Şifremi Unuttum
                            </span>
                        <p class="text-muted">Lütfen kayıtlı e-posta adresinizi giriniz..</p>
                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Lütfen eposta adresi giriniz: ex@kocaeli.edu.tr">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" id="eposta" type="email" placeholder="E-posta adresi giriniz...">
                        </div>
                        <div class="submit">
                            <a id="gonder" class="btn btn-primary d-grid" href="javascript:void(0)">Gönder</a>
                        </div>
                        <div class="text-center mt-4">
                            <p class="text-dark mb-0">Şifreni hatırladın mı?<a class="text-primary ms-1" href="{{route("login")}}">Geri dön :)</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END PAGE -->

</div>
<!-- BACKGROUND-IMAGE CLOSED -->

<!-- JQUERY JS -->
<script src="{{asset('')}}assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('')}}assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('')}}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SHOW PASSWORD JS -->
<script src="{{asset('')}}assets/js/show-password.min.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('')}}assets/plugins/p-scroll/perfect-scrollbar.js"></script>

<!-- Color Theme js -->
<script src="{{asset('')}}assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('')}}assets/js/custom.js"></script>

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

        $("#gonder").click(function (e) {
            e.preventDefault();
            let eposta = $('#eposta').val();
            $.ajax({
                type: "post",
                url: "{{route('forgotpasswordpost')}}",
                data: {
                    eposta: eposta,
                },
                success: function (data) {
                    console.log(data);
                    if(data["type"]=="success"){
                        setTimeout(function (){
                            window.location.href="{{route('login')}}";
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
