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
                        <li class="breadcrumb-item"><a href="{{route("student")}}">Ana</a></li>
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
                            @if($categorys)
                                <div class="col-xl-3">
                                    @foreach($categorys as $category)
                                        <a href="{{route("studentliststatusproject",$category->durum_id)}}">
                                            <div class="card {{$category->stil}} img-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font">{{$category->adet}}</h2>
                                                            <p class="text-white mb-0">{{$category->adi}}</p>
                                                        </div>
                                                        <div class="ms-auto"><i
                                                                    class="{{$category->ikon}} text-white fs-30 me-2 mt-2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                            <div class="@if($categorys) col-xl-6 @else col-xl-9 @endif">
                                {{--Proje ÖNER--}}
                                <div class="card @if($dataProject[0]) card-collapsed @endif">
                                    <div class="card-header">
                                        <h3 class="card-title">Proje Öner</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-collapse" data-bs-toggle="card-collapse">
                                                <i class="fe fe-chevron-up"></i></a>
                                        </div>
                                    </div>
                                    <form id="addProject">
                                        <div class="card-body">

                                            <input id="projeadi" class="form-control mb-2" placeholder="Proje Başlığı"/>
                                            <textarea id="amac" class="form-control mb-2"
                                                      placeholder="Projenin amacını, önemini ve kapsamını giriniz"
                                                      rows="7"></textarea>
                                            <textarea id="materyal" class="form-control mb-2"
                                                      placeholder="Projenin materyal, yöntem ve araştırma olanaklarını giriniz"
                                                      rows="7"></textarea>
                                            <input id="anahtarkelimeler" class="form-control tagin"/>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button id="temizle" class="btn btn-danger px-4 py-2"><i
                                                        class="fa fa-times ms-1"></i>Temizle
                                            </button>
                                            <button id="oner" class="btn btn-success px-4 py-2"><i
                                                        class="fa fa-share ms-1"></i>Öner
                                            </button>
                                        </div>
                                    </form>

                                </div>

                                {{--Projeler--}}

                                @foreach($dataProject as $project)
                                    <div class="card border p-0 shadow-none mb-2">
                                        <div class="card-body">
                                            <div class="mt-4">
                                                <div class="col-xl-12 text-end"><small>{{$project->donem->adi}}</small>
                                                </div>

                                                <h4 class="fw-semibold mt-3 mb-0"><a
                                                            href="{{route("studentdetailproject",$project->id)}}">{{$project->adi}}</a>
                                                    <span
                                                            class="badge {{$project->durum->stil}} fs-8">{{$project->durum->adi}}</span>
                                                </h4>
                                                <small
                                                        class="text-muted mt-0">{{$project->created_at->format("d.m.Y")}}</small>
                                                <p class="mb-0 text-justify">{{mb_substr($project->amac,0,200,'UTF-8')}}<a
                                                            href="{{route("studentdetailproject",$project->id)}}">...</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-footer user-pro-2">
                                            <div class="tags">
                                                @foreach($project->anahtarkelime as $anahtarkelimeler)
                                                    <a href="javascript:void(0)"
                                                       data-kelime-id="{{$anahtarkelimeler->id}}"
                                                       data-id="{{$project->id}}"
                                                       class="tag position-relative">{{$anahtarkelimeler->kelime}}
                                                        @if(count($anahtarkelimeler->proje->where("durum_id","<","8"))>1 && $project->durum_id!=8)
                                                            <span style="font-size: 8px"
                                                                  class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{count($anahtarkelimeler->proje->where("durum_id","<","8"))-1}}
                                                    </span>
                                                        @endif
                                                    </a>
                                                @endforeach
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
                                <nav class="d-flex justify-content-end">
                                    {{$dataProject->links()}}
                                </nav>


                            </div>
                            @if($data->danisman_id!=null)
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Danışman Öğretmen</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div class="media overflow-visible">
                                                    <img class="avatar brround avatar-md me-3"
                                                         src="{{$data->danisman->img}}"
                                                         alt="{{$data->danisman->adi." ".$data->danisman->soyadi}}">
                                                    <div class="media-body valign-middle mt-2">
                                                        <a href="javascript:void(0)"
                                                           class=" fw-semibold text-dark">{{$data->danisman->adi." ".$data->danisman->soyadi}}</a>
                                                        <p class="text-muted mb-0">{{$data->danisman->eposta}}</p>
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
            const tagin = new Tagin(document.querySelector('.tagin'), {
                placeholder: 'Anahtar kelime giriniz...',
            })

            $('.tagin-input').keydown(function () {
                if ($('.tagin-tag')[5]) {
                    $('.tagin-tag')[5].remove();
                }
            });
            $('.tagin-input').keyup(function () {
                if ($('.tagin-tag')[5]) {
                    $('.tagin-tag')[5].remove();
                }

            });

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
                console.log(this.innerText);
                $.ajax({
                    type: "post",
                    url: "{{route("keywordproject")}}",
                    data: {
                        projeid: this.getAttribute('data-id'),
                        anahtarkelime: this.getAttribute('data-kelime-id')
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

            //https://merttopuz.com/yazilim/php/php-ile-cumle-karsilastirma-uygulamasi
            function similarity(text1, text2, isolate = []) {
                var final = [];
                var text1Split = text1.split(" ");
                var text2Split = text2.split(" ");
                for (var m = 0; m < text1Split.length; m++) {
                    for (var s = 0; s < text2Split.length; s++) {
                        if (text1Split[m].toLowerCase() == text2Split[s].toLowerCase()) {
                            var uyari = 0;
                            for (var n = 0; n < isolate.length; n++) {
                                for (var b = 0; b < text1Split[n].length; b++) {
                                    if (isolate[n].toLowerCase() == text1Split[m].toLowerCase()) {
                                        uyari = 1;
                                    }
                                }
                            }
                            if (uyari == 0) {
                                final[m] = 1;
                                break;
                            }
                        } else {
                            final[m] = 0;
                        }
                    }
                }

                var counts = {};

                for (var i = 0; i < final.length; i++) {
                    var key = final[i];
                    counts[key] = (counts[key]) ? counts[key] + 1 : 1;

                }

                var olasilik = 0;
                if (counts[1]) {
                    olasilik = counts[1] / final.length * 100;
                } else {
                    olasilik = 0;
                }

                return olasilik;

            }

            $("#oner").click(function (e) {
                e.preventDefault();
                let projeadi = $('#projeadi').val();
                let projeamac = $('#amac').val();
                let projemateryal = $('#materyal').val();
                let anahtarkelimeler = tagin.getTags();

                $.ajax({
                    type: "post",
                    url: "{{route("studentsimilarproject")}}",
                    data: {"similar": "similar"},
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            var similarad = similarity(projeadi, data[i]["adi"])
                            var similaramac = similarity(projeamac, data[i]["amac"])
                            var similarmateryal = similarity(projemateryal, data[i]["materyal"])

                            if (similarad > 90) {
                                return notif({
                                    "msg": "Proje adı benzerliği çok fazla :" + similarad,
                                    "type": "error"
                                })
                            }
                            if (similaramac > 30) {
                                return notif({
                                    "msg": "Proje amacı benzerliği çok fazla :" + similaramac,
                                    "type": "error"
                                })
                            }
                            if (similarmateryal > 30) {
                                return notif({
                                    "msg": "Proje materyal benzerliği çok fazla :" + similarmateryal,
                                    "type": "error"
                                })
                            }
                        }

                        $.ajax({
                            type: "post",
                            url: "{{route("studentsuggestproject")}}",
                            data: {
                                projeadi: projeadi,
                                projeamac: projeamac,
                                projemateryal: projemateryal,
                                anahtarkelimeler: anahtarkelimeler,
                            },
                            success: function (data) {
                                notif(data);
                                if (data["type"] == "success") {
                                    $('#projeadi').val('');
                                    $('#amac').val('');
                                    $('#materyal').val('');
                                    $('.tagin-tag').remove();
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000)
                                }


                            }
                        });

                    }
                });


            });

        })


    </script>
@endsection


