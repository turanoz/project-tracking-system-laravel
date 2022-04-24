@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Admin | Anasayfa
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Profil Düzenle</h1>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Şifreni Değiştir</div>
                            </div>
                            <div class="card-body">
                                <div class="text-center chat-image mb-5">
                                    <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                        <a class="" href="#"><img alt="avatar" id="avatarimg" src="{{$data->img}}"
                                                                  class="brround avatar avatar-xxl"></a>
                                        <span id="resimdegistirspan" class="badge rounded-pill avatar-icons bg-primary">
                                                <i class="fe fe-edit fs-12"></i>
                                        </span>
                                        <input type="file" id="resimdegistir" style="display:none;" accept="image/*">


                                    </div>
                                    <div class="main-chat-msg-name">
                                        <a href="">
                                            <h5 class="mb-1 text-dark fw-semibold">{{$data->adi." ".$data->soyadi}}</h5>
                                        </a>
                                        @if(\Illuminate\Support\Facades\Session::get("type")!="1")
                                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{$data->bolum->adi}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mevcut şifre</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                        <a href="#" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" type="password" id="msifre"
                                               placeholder="Mevcut Parola">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Yeni Şifre</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                        <a href="#" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" type="password" id="ysifre"
                                               placeholder="Yeni Parola">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tekrar Şifre</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                        <a href="#" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" type="password" id="ysifretekrar"
                                               placeholder="Tekrar Yeni Parola">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a id="sifreguncelle" href="#" class="btn btn-primary">Güncelle</a>
                                <a href="#" class="btn btn-danger">Vazgeç</a>
                            </div>
                        </div>

                        {{--<div class="card">
                            <div class="card-header">
                                <div class="card-title">Notifications</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group mg-b-10">
                                    <label class="custom-switch ps-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                        <span class="custom-switch-indicator me-3"></span>
                                        <span class="custom-switch-description mg-l-10">Updates Automatically</span>
                                    </label>
                                </div>
                                <div class="form-group mg-b-10">
                                    <label class="custom-switch ps-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                        <span class="custom-switch-indicator me-3"></span>
                                        <span class="custom-switch-description mg-l-10">Allow Location Map</span>
                                    </label>
                                </div>
                                <div class="form-group mg-b-10">
                                    <label class="custom-switch ps-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                        <span class="custom-switch-indicator me-3"></span>
                                        <span class="custom-switch-description mg-l-10">Show Contacts</span>
                                    </label>
                                </div>
                                <div class="form-group mg-b-10">
                                    <label class="custom-switch ps-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                        <span class="custom-switch-indicator me-3"></span>
                                        <span class="custom-switch-description mg-l-10">Show Notfication</span>
                                    </label>
                                </div>
                                <div class="form-group mg-b-10">
                                    <label class="custom-switch ps-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                        <span class="custom-switch-indicator me-3"></span>
                                        <span class="custom-switch-description mg-l-10">Show Tasks Statistics</span>
                                    </label>
                                </div>
                                <div class="form-group mg-b-10">
                                    <label class="custom-switch ps-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                        <span class="custom-switch-indicator me-3"></span>
                                        <span class="custom-switch-description mg-l-10">Show Email Notification</span>
                                    </label>
                                </div>
                            </div>
                        </div>--}}

                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Profil Düzenle</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="@if(\Illuminate\Support\Facades\Session::get("type")!=3) col-lg-12 @else col-lg-6 @endif col-md-12">
                                        <div class="form-group">
                                            <label for="no">No</label>
                                            <input type="text" class="form-control" id="no" value="{{$data->id}}"
                                                   disabled>
                                        </div>
                                    </div>

                                    @if(\Illuminate\Support\Facades\Session::get("type")==3)
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="sinif">Sınıf</label>
                                                <select id="sinif" class="form-control">
                                                    <option value="Hazırlık">Hazırlık</option>
                                                    <option value="1.Sınıf">1. Sınıf</option>
                                                    <option value="2.Sınıf">2. Sınıf</option>
                                                    <option value="3.Sınıf">3. Sınıf</option>
                                                    <option value="4.Sınıf">4. Sınıf</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="ad">Ad</label>
                                            <input type="text" class="form-control" id="ad" value="{{$data->adi}}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="soyadi">Soyad</label>
                                            <input type="text" class="form-control" id="soyadi"
                                                   value="{{$data->soyadi}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eposta">E-posta Adresi</label>
                                    <input type="email" class="form-control" id="eposta" placeholder="E-posta adresi"
                                           value="{{$data->eposta}}">
                                </div>
                                <div class="form-group">
                                    <label for="tel">Telefon Numarası</label>
                                    <input type="number" class="form-control" id="tel" placeholder="Telefon Numarası"
                                           value="{{$data->tel}}">
                                </div>

                            </div>
                            <div class="card-footer text-end">
                                <a id="profilduzenle" href="#" class="btn btn-success my-1">Kaydet</a>
                                <a href="temizle" class="btn btn-danger my-1">Vazgeç</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!--CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
@section("js")
    <!-- SHOW PASSWORD JS -->
    <script src="{{asset("")}}assets/js/show-password.min.js"></script>
    <!-- INTERNAL Notifications js -->
    <script src="{{asset("")}}assets/plugins/notify/js/rainbow.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/notifIt.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{asset("")}}assets/plugins/select2/select2.full.min.js"></script>
    <script src="{{asset("")}}assets/js/select2.js"></script>
    <script>
        $(document).ready(function () {
            $("#sinif").val("{{$data->sinif}}");
            $("#sinif").select2();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#profilduzenle").click(function (e) {
                e.preventDefault();
                let eposta = $('#eposta').val();
                let tel = $('#tel').val();
                let sinif = $('#sinif').val();
                console.log(sinif);
                $.ajax({
                    type: "post",
                    url: "{{route("editprofileedit")}}",
                    data: {
                        eposta: eposta,
                        tel: tel,
                        sinif: sinif
                    },
                    success: function (data) {
                        notif(data);
                    }
                });

            });
            $("#sifreguncelle").click(function (e) {
                e.preventDefault();
                let msifre = $('#msifre').val();
                let ysifre = $('#ysifre').val();
                let ysifretekrar = $('#ysifretekrar').val();
                $.ajax({
                    type: "post",
                    url: "{{route("editprofileeditpass")}}",
                    dataType: "json",
                    data: {
                        msifre: msifre,
                        ysifre: ysifre,
                        ysifretekrar: ysifretekrar
                    },
                    success: function (data) {
                        notif(data);
                        if(data["type"]=="success"){
                            setTimeout(function (){
                                window.location.href="{{route("signout")}}";
                            },2000);
                        }

                    }
                });

            });
            $("#resimdegistirspan").click(function () {
                $("#resimdegistir").click();
            })
            $("#resimdegistir").change(function (e) {

                var img = $('#resimdegistir')[0].files;

                if (img.length > 0) {
                    var fd = new FormData();
                    // Append data
                    fd.append('profileimg', img[0]);

                    fd.append('_token', $('meta[name="csrf-token"]').attr('content'));

                    $.ajax({
                        url: "{{route("editprofileeditresim")}}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (response) {
                            notif(response);
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    });
                }
                e.preventDefault();

            })

        });
    </script>
@endsection







