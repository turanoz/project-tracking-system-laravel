@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Öğrenci | Anasayfa
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">{{$ogrenci->adi." ".$ogrenci->soyadi}}</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("mystudent")}}">Öğrencilerim</a></li>
                        <li class="breadcrumb-item active"
                            aria-current="page">{{$ogrenci->adi." ".$ogrenci->soyadi}}</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                @if(count($ogrenci->proje)==0)
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Uyarı</div>
                            </div>
                            <div class="card-body">
                                <p class="">Öğrenci hiç proje önermemiş :(</p>
                                <a href="{{url()->previous()}}" class="btn btn-primary">Geri Dön</a>
                            </div>
                        </div>
                    </div>
                @else
                <!-- ROW-1 OPEN -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                @if($ogrenci)
                                    <div class="col-xl-3">
                                        @foreach($ogrenci->proje->unique('durum_id')->sortBy('durum_id') as $proje)
                                            <a href="{{route("teacherstudentliststatusproject",[$ogrenci->id,$proje->durum->id])}}">
                                                <div class="card {{$proje->durum->stil}} img-card mb-2">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="text-white">
                                                                <h2 class="mb-0 number-font">{{$ogrenci->proje->where("durum_id",$proje->durum->id)->count()}}</h2>
                                                                <p class="text-white mb-0">{{$proje->durum->adi}}</p>
                                                            </div>
                                                            <div class="ms-auto"><i
                                                                        class="{{$proje->durum->ikon}} text-white fs-30 me-2 mt-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="@if($ogrenci->danisman_id==\Illuminate\Support\Facades\Session::get('id')) col-xl-9 @else col-xl-6 @endif">
                                    {{--Projeler--}}
                                    @foreach($ogrenci_project as $proje)
                                        <div class="card border p-0 shadow-none mb-2">
                                            <div class="card-body">
                                                <div class="mt-4">
                                                    <div class="row">
                                                        <div class="col-xl-12 text-end">
                                                            <small>{{$proje->donem->adi}}</small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <h4 class="fw-semibold mt-3 mb-0">
                                                                <a href="{{route("teacherdetailproject",$proje->id)}}">{{$proje->adi}}</a>
                                                                <span class="badge {{$proje->durum->stil}} fs-8">{{$proje->durum->adi}}</span>
                                                            </h4>
                                                        </div>

                                                    </div>


                                                    <small class="text-muted mt-0">{{$proje->created_at->format("d.m.Y")}}</small>
                                                    <p class="mb-0 text-justify">{{substr($proje->amac,0,300)}}
                                                        <a class="text-dark" href="{{route("teacherdetailproject",$proje->id)}}">...</a></p>
                                                </div>

                                            </div>
                                            <div class="card-footer user-pro-2">
                                                <div class="tags">

                                                    @foreach($proje->anahtarkelime as $anahtarkelime)
                                                        <a href="javascript:void(0)"
                                                           data-kelime-id="{{$anahtarkelime->id}}"
                                                           data-id="{{$proje->id}}"
                                                           class="tag position-relative">{{$anahtarkelime->kelime}}
                                                            @if(count($anahtarkelime->proje->where("durum_id","<","8"))>1 && $proje->durum_id!=8)
                                                                <span style="font-size: 8px"
                                                                      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{count($anahtarkelime->proje->where("durum_id","<","8"))-1}}
                                                    </span>
                                                            @endif
                                                        </a>
                                                    @endforeach

                                                    {{--@foreach($proje->anahtarkelime as $anahtarkelime)
                                                        <a href="javascript:void(0)" data-id="{{$proje->id}}"
                                                           class="tag">{{$anahtarkelime->kelime}}</a>
                                                    @endforeach--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                <!-- MODAL EFFECTS -->
                                    <div class="modal fade" id="modalAnahtarKelime">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg text-justify">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Anahtar kelime ile ilgili Projeler</h6>
                                                    <button aria-label="Close" class="btn-close"
                                                            data-bs-dismiss="modal"><span
                                                                aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body" id="tagProjectContent">

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-light" id="modalclose">Kapat</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--Proje Sayfalama--}}
                                    <nav class="d-flex justify-content-end">
                                        {{$ogrenci_project->links()}}
                                    </nav>
                                </div>
                                @if(\Illuminate\Support\Facades\Session::get('id')!=$ogrenci->danisman_id)
                                    <div class="col-xl-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Danışman Öğretmen</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="">
                                                    <div class="media overflow-visible">
                                                        <img class="avatar brround avatar-md me-3"
                                                             src="{{$ogrenci->danisman->img}}"
                                                             alt="{{$ogrenci->danisman->adi." ".$ogrenci->danisman->soyadi}}">
                                                        <div class="media-body valign-middle mt-2">
                                                            <a href="javascript:void(0)"
                                                               class=" fw-semibold text-dark">{{$ogrenci->danisman->adi." ".$ogrenci->danisman->soyadi}}</a>
                                                            <p class="text-muted mb-0">{{$ogrenci->danisman->eposta}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- COL-END -->
                    </div>
                    <!-- ROW-1 CLOSED -->
                @endif
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
@section("stil")
    <link href="{{asset("")}}assets/plugins/tagin-master/dist/tagin.css" rel="stylesheet"/>
@endsection
@section("js")
    <script src="{{asset("")}}assets/plugins/notify/js/rainbow.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/notifIt.js"></script>
    <script src="{{asset("")}}assets/plugins/tagin-master/dist/tagin.js"></script>
    <script>
        $(document).ready(function () {

            var modal = $("#modalAnahtarKelime");
            var modalAnahtarKelime = new bootstrap.Modal(modal, {
                backdrop: "static"
            })

            $("#modalclose").click(function () {
                modalAnahtarKelime.toggle();
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.tag').click(function (e) {


                $.ajax({
                    type: "post",
                    url: "{{route("keywordproject")}}",
                    data: {
                        projeid: this.getAttribute('data-id'),
                        anahtarkelime: this.getAttribute('data-kelime-id'),
                    },
                    success: function (data) {

                        $("#tagProjectContent").html(data);
                        if (data != "") {
                            modalAnahtarKelime.toggle();
                        } else {
                            notif({
                                msg: "İlgili anahtar kelime ile ilgili benzer proje bulunamadı.",
                                type: "warning"
                            });
                        }
                    }
                });
                e.preventDefault();
            });
        })


    </script>
@endsection


