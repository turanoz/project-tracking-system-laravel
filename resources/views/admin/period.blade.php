@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Admin | Dönemler
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Dönemler</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route("login")}}">Ana</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dönemler</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <!-- Row -->
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Dönem Ekle</h3>
                                <div class="card-options">
                                    <a id="donemeklebtn" href="javascript:void(0)"
                                       class="btn btn-success btn-sm">Ekle</a>
                                    <a id="donemeklesifirlabtn" href="javascript:void(0)"
                                       class="btn btn-danger btn-sm ms-2">Sıfırla</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input id="doneminput" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Aktif Dönem</h3>
                                <div class="card-options">
                                    <a id="aktifdonembtn" href="javascript:void(0)" class="btn btn-success btn-sm">Kaydet</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" id="aktifdonem">
                                        @isset($donemler)
                                            @foreach($donemler as $donem)
                                                <option value="{{$donem->id}}">{{$donem->adi}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Dönemlere Göre Projeler</h3>
                                <div class="card-options">
                                    <span class="d-inline-block m-3">Dönem</span>
                                    <select id="donem-select" onchange="window.location.href=this.value"
                                            class="form-control">
                                        @isset($donemler)
                                            @foreach($donemler as $donem)
                                                <option value="{{route("adminperiod",$donem->id)}}">{{$donem->adi}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm align-middle">
                                        <thead>
                                        <tr>
                                            <th>Tarih</th>
                                            <th>Proje Adı</th>
                                            <th>Öğrenci</th>
                                            <th>Danışman</th>
                                            <th>Bölüm</th>
                                        </tr>
                                        </thead>
                                        <tbody id="donemproje-list">
                                        @isset($projeler)
                                            @foreach($projeler as $key => $proje)
                                                <tr>
                                                    <td>{{$proje->updated_at->format("d.m.Y")}}</td>
                                                    <td><a class="text-dark"
                                                           href="/proje/{{$proje->id}}">{{mb_substr($proje->adi,0,50,'UTF-8')}}...</a></td>
                                                    <td><a class="text-dark"
                                                           href="/ogrenci/{{$proje->ogrenci->id}}">{{$proje->ogrenci->adi." ".$proje->ogrenci->soyadi}} </a>
                                                    </td>
                                                    <td>{{$proje->danisman->adi." ".$proje->danisman->soyadi}}</td>
                                                    <td>{{$proje->ogrenci->bolum->adi}}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <caption>
                                            {{$projeler->links()}}
                                        </caption>
                                        @endisset
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
@section("js")
    <!-- INTERNAL NOTIFY JS -->
    <script src="{{asset("")}}assets/plugins/notify/js/rainbow.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/notifIt.js"></script>
    <script>
        $(document).ready(function () {
            var donem = window.location.pathname.split('/');
            if (donem[3] !== undefined) {
                $("#donem-select").val('{{route('adminperiod')}}' + '/' + donem[3]);
            }

            /*$.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url: "{{--{{route('periodspost')}}--}}",
                data: {
                    donem: donem,
                },
                success: function (data) {
                    $("#donemproje-list").html('');
                    for (var i = 0; i < data.length; i++) {
                        $("#donemproje-list").append(
                            `
                                  <tr>
                                                <td>${i + 1}</td>
                                                <td>${data[i]['tarih']}</td>
                                                <td><a class="text-dark" href="/proje/${data[i]['projeid']}">${data[i]['projeadi']}</a></td>
                                                <td>${data[i]['ogrenciadi']} ${data[i]['ogrencisoyadi']}</td>
                                                <td>${data[i]['danismanadi']} ${data[i]['danismansoyadi']}</td>
                                                <td>${data[i]['bolumadi']}</td>

                                            </tr>
                                  `
                        );
                    }
                }
            });*/
            /*$("#donem-select").change(function (e) {
                e.preventDefault();
                const donem = $("#donem-select").val();
                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    url: "{{--{{route('periodspost')}}--}}",
                    data: {
                        donem: donem,
                    },
                    success: function (data) {
                        $("#donemproje-list").html('');
                        for (var i = 0; i < data.length; i++) {
                            $("#donemproje-list").append(
                                `
                                  <tr>
                                                <td>${i + 1}</td>
                                                <td>${data[i]['tarih']}</td>
                                                <td><a class="text-dark" href="/proje/${data[i]['projeid']}">${data[i]['projeadi']}</a></td>
                                                <td>${data[i]['ogrenciadi']} ${data[i]['ogrencisoyadi']}</td>
                                                <td>${data[i]['danismanadi']} ${data[i]['danismansoyadi']}</td>
                                                <td>${data[i]['bolumadi']}</td>

                                            </tr>
                                  `
                            );
                        }
                    }
                });
            });
*/
            $("#donemeklebtn").click(function (e) {
                e.preventDefault();
                const donem = $("#doneminput").val();
                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    url: "{{route('periodsaddpost')}}",
                    data: {
                        donem: donem,
                    },
                    success: function (data) {
                        notif(data);
                        if (data['type'] == "success") {
                            setTimeout(function () {
                                location.reload();
                            }, 2000)
                        }
                    }
                });
            });
            $("#aktifdonembtn").click(function (e) {
                e.preventDefault();
                const donem = $("#aktifdonem").val();
                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    url: "{{route('periodsactivepost')}}",
                    data: {
                        donem: donem,
                    },
                    success: function (data) {
                        notif(data);
                        if (data['type'] == "success") {
                            setTimeout(function () {
                                location.reload();
                            }, 2000)
                        }
                    }
                });
            });

        });
    </script>
@endsection
