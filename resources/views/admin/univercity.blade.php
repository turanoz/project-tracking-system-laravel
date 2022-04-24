@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Admin | Üniversite
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Üniversite</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route("login")}}">Ana</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Üniversite</li>
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
                                <h3 class="card-title">Listele</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="label-text" for="fakulteselect">Fakülte</label>
                                        <select id="fakultelistselect" class="form-control" >
                                            <option value="">Seçiniz</option>
                                            @foreach($fakulteler as $fakulte)
                                                <option value="{{$fakulte->id}}">{{$fakulte->adi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="label-text" for="fakulteselect">Bölüm</label>
                                        <select id="bolumlistselect" class="form-control" >
                                            <option value="">Seçiniz</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Fakülteler</h3>
                                <div class="card-options">
                                    <a id="fakulteeklebtn" href="javascript:void(0)"
                                       class="btn btn-success btn-sm me-2">Ekle</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="label-text" for="fakulteinput">Fakülte</label>
                                    <input id="fakulteinput" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bölümler</h3>
                                <div class="card-options">
                                    <a id="bolumeklebtn" href="javascript:void(0)"
                                       class="btn btn-success btn-sm me-2">Ekle</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="label-text" for="fakultesec">Fakülte</label>
                                    <select class="form-control" id="fakultesec">
                                            <option value="">Seçiniz</option>
                                        @foreach($fakulteler as $fakulte)
                                            <option value="{{$fakulte->id}}">{{$fakulte->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="label-text" for="boluminput">Bölüm</label>
                                        <input id="boluminput" class="form-control" type="text">
                                    </div>
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
            $("#bolumeklebtn").click(function (e) {
                e.preventDefault();
                const fakulte = $("#fakultesec").val();
                const bolum=$("#boluminput").val();
                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    url: "{{route('branchaddpost')}}",
                    data: {
                        fakulte: fakulte,
                        bolum: bolum,
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
            $("#fakulteeklebtn").click(function (e) {
                e.preventDefault();
                const fakulte = $("#fakulteinput").val();
                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    url: "{{route('facultyaddpost')}}",
                    data: {
                        fakulte: fakulte,
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
            $("#fakultelistselect").change(function (e) {
                e.preventDefault();
                const fakulte = $("#fakultelistselect").val();
                if (fakulte!="")
                {
                    $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    url: "{{route('branchlistpost')}}",
                    data: {
                        fakulte: fakulte,
                    },
                    success: function (data) {
                        $("#bolumlistselect").html(`<option value="">Seçiniz</option>`);
                        for (var i=0;i<data.length;i++){
                            var html=`<option value="${data[i]["fakulte_id"]}">${data[i]["adi"]}</option>`;
                            $("#bolumlistselect").append(html);
                        }
                        if (data['type'] == "error") {
                            notif(data);
                        }
                    }
                });
                }else {
                    $("#bolumlistselect").html(`<option value="">Seçiniz</option>`);
                }

            });

        });
    </script>
@endsection
