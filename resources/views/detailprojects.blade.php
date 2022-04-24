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
                <h1 class="page-title">Projeler</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("detailprojects")}}">Ana</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projeler</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-xl-3">
                                @foreach($projectstatus->unique("durum_id")->sortBy("durum_id") as $proje)
                                    <a href="{{route('liststatusprojects',$proje->durum_id)}}">
                                        <div class="card {{$proje->durum->stil}} img-card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="text-white">
                                                        <h2 class="mb-0 number-font">{{$teacher->where("durum_id",$proje->durum_id)->count()}}</h2>
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
                            <div class="col-xl-9">

                                {{--Projeler--}}
                                @foreach($project as $proje)
                                    <div class="card border p-0 shadow-none mb-2">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="col-xl-6 ms-0 ps-0">
                                                    <div class="media mt-0">
                                                        <div class="media-user me-2">
                                                            <div class="">
                                                                <img src="{{$proje->ogrenci->img}}"
                                                                     class="rounded-circle avatar avatar-md">
                                                            </div>
                                                        </div>
                                                        <div class="media-body ">
                                                            <h6 class="mb-0 mt-1">{{$proje->ogrenci->adi." ".$proje->ogrenci->soyadi}}</h6>
                                                            <small data-bs-toggle="tooltip" data-bs-placement="right" title="{{$proje->updated_at->format("d.m.Y H:i")}}" class="text-muted">{{\App\Traits\Support\StringTrait::timeConvert($proje->updated_at)}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 text-end"><small>{{$proje->donem->adi}}</small></div>
                                            </div>
                                            <div class="mt-4">
                                                <h4 class="fw-semibold mt-3 mb-0">
                                                    <a href="{{route("teacherdetailproject",$proje->id)}}">{{$proje->adi}}</a>
                                                    <span class="badge {{$proje->durum->stil}} fs-8">{{$proje->durum->adi}}</span>
                                                </h4>
                                                <p class="mb-0 text-justify">{{mb_substr($proje->amac,0,350,'UTF-8')}}
                                                    <a href="{{route("teacherdetailproject",$proje->id)}}">...</a>
                                                </p>
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


                                               {{-- @foreach($proje->anahtarkelime as $anahtarkelime)
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
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span></button>
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
                                <nav class="d-flex justify-content-end my-3">
                                    {{$project->links()}}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <!-- ROW-1 CLOSED -->
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


