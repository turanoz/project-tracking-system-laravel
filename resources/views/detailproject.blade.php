@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Öğrenci | Anasayfa
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Proje Detayları</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Proje</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Proje Detayları</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card mb-5">
                            <div class="card-footer">
                                <div class="text-end">{{$data->created_at->format('d.m.Y')}}</div>
                                @if(\Illuminate\Support\Facades\Session::get('id')!=$data->danisman_id)
                                    <span class="badge {{$devamedenproje->stil}}  fs-12">{{$devamedenproje->adi}}</span>
                                @else
                                <span class="badge {{$data->durum->stil}} fs-12">{{$data->durum->adi}}</span>
                                @endif
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">{{$data->adi}}</h1>
                                <h5 class="fw-bold">Projenin amacı,önemi ve kapsamı:</h5>
                                <p class="text-justify">{{$data->amac}}</p>
                                <h5 class="fw-bold">Materyal, yöntem ve araştırma olanakları:</h5>
                                <p class="text-justify">{{$data->materyal}}</p>
                            </div>
                        </div>
                        @if($data->durum->id<=3 && $data->danisman_id==\Illuminate\Support\Facades\Session::get("id"))
                            {{--ÖNERİ ONAY İŞLEMLERİ--}}
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h4 class="card-title">Onay işlemleri</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">İşlemler</label>
                                        <select id="oneriislemselect" class="form-control form-select select2"
                                                data-bs-placeholder="Select Country">
                                            <option value="5" selected>Onayla</option>
                                            <option value="8">Reddet</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nedeni</label>
                                        <textarea id="onerineden" class="form-control" rows="5"></textarea>
                                    </div>
                                    <button id="oneribtn" class="btn btn-primary">Gönder</button>
                                </div>
                            </div>
                            {{--ÖNERİ ONAY İŞLEMLERİ END--}}
                        @endif
                    </div>
                    <div class="col-xl-4">

                        @if($data->danisman_id!=\Illuminate\Support\Facades\Session::get("id"))
                            {{--ÖĞRENCİ BİLGİLERİ--}}
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Proje Sahibi</div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="media overflow-visible">
                                            <img class="avatar brround avatar-md me-3" src="{{$data->ogrenci->img}}"
                                                 alt="{{$data->ogrenci->adi." ".$data->ogrenci->soyadi}}">
                                            <div class="media-body valign-middle mt-2">
                                                <a href="{{route('detailstudent',$data->ogrenci->id)}}"
                                                   class=" fw-semibold text-dark">{{$data->ogrenci->adi." ".$data->ogrenci->soyadi}}</a>
                                                <p class="text-muted mb-0">{{$data->ogrenci->eposta}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--DANIŞMAN BİLGİLERİ--}}
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Danışman Öğretmen</div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="media overflow-visible">
                                            <img class="avatar brround avatar-md me-3" src="{{$data->danisman->img}}"
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
                        @endif

                        {{--RAPOR VE TEZLER--}}
                        <div class="card mb-2">
                            <div class="card-header p-3">
                                <div class="card-title">Raporlar ve Tezler</div>
                            </div>
                            <div class="card-body ms-2 p-2">
                                <!-- col -->
                                <div class="my-0">
                                    <ul id="tree2">
                                        <li><a href="#">Raporlar</a>
                                            <ul>
                                                @foreach($raporlar as $key => $rapor)
                                                    <li><a href="#">Rapor {{$key}}</a>
                                                        <ul>
                                                            @foreach($rapor as $raporalt)
                                                                <li>
                                                                    <a href="#">{{$raporalt->created_at->format('dmyhi')}}</a><span
                                                                        class="badge {{$raporalt->durum->stil}} fs-8 ms-1">{{$raporalt->durum->adi}} </span>
                                                                    @if($raporalt->durum->id<=3)
                                                                        <input class="rprtezcheck form-check-input ms-2"
                                                                               style="position: absolute; top: 5.5px"
                                                                               type="checkbox"
                                                                               value="{{$raporalt->id}}">
                                                                    @endif
                                                                    <ul>
                                                                        <li>
                                                                            <a href="{{route("download")}}?path={{$raporalt->docx}}">{{$raporalt->created_at->format('dmYhi')}}
                                                                                Rapor{{$raporalt->no}}.docx</a></li>
                                                                        <li>
                                                                            <a href="{{route("download")}}?path={{$raporalt->pdf}}">{{$raporalt->created_at->format('dmYhi')}}
                                                                                Rapor{{$raporalt->no}}.pdf</a></li>
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Tezler</a>
                                            <ul>
                                                @foreach($data->tez as $tez)
                                                    <li><a href="#">{{$tez->created_at->format('dmy')}} </a>
                                                        <span class="badge {{$tez->durum->stil}} fs-8 ms-1">{{$tez->durum->adi}} </span>
                                                        @if($tez->durum->id<=3)
                                                            <input class="rprtezcheck form-check-input ms-2"
                                                                   style="position: absolute; top: 5.5px"
                                                                   type="checkbox"
                                                                   value="{{$tez->id}}">
                                                        @endif
                                                        <ul>
                                                            <li>
                                                                <a href="{{route("download")}}?path={{$tez->docx}}">{{$tez->created_at->format('dmYhi')}}
                                                                    .docx</a></li>
                                                            <li>
                                                                <a href="{{route("download")}}?path={{$tez->pdf}}">{{$tez->created_at->format('dmYhi')}}
                                                                    .pdf</a></li>
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /col -->
                            </div>
                        </div>
                        @if($data->durum_id==4&&$data->danisman_id==\Illuminate\Support\Facades\Session::get("id"))
                            {{--Rapor Tez Onay İşlemleri--}}
                            <div class="card mb-2">
                                <div class="card-header p-3">
                                    <h4 class="card-title">İşlemler</h4>
                                </div>
                                <div class="card-body pt-4">
                                    <div class="form-group">
                                        {{--                                    <label class="form-label">İşlemler</label>--}}
                                        <select id="rprtezislemselect" class="form-control form-select select2"
                                                data-bs-placeholder="Seçiniz...">
                                            <option value="6" selected>Onayla</option>
                                            <option value="8">Reddet</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nedeni <input id="rprteznedencheck"
                                                                                class="form-check-input ms-1"
                                                                                type="checkbox"></label>
                                        <textarea id="rprtezneden" class="form-control" rows="5"></textarea>
                                    </div>
                                    <button id="rprtezbtn" class="btn btn-primary">Gönder</button>


                                </div>
                            </div>
                            {{--Rapor Tez Onay İşlemleri End--}}
                        @endif
                        {{--Anahtar Kelime--}}
                        <div class="card">
                            <div class="card-header p-3">
                                <div class="card-title">Anahtar Kelimeler</div>
                            </div>
                            <div class="card-body">
                                <div class="tags">

                                    @foreach($data->anahtarkelime as $anahtarkelime)
                                        <a href="javascript:void(0)"
                                           data-kelime-id="{{$anahtarkelime->id}}"
                                           data-id="{{$data->id}}"
                                           class="tag position-relative">{{$anahtarkelime->kelime}}
                                            @if(count($anahtarkelime->proje->where("durum_id","<","8"))>1 && $data->durum_id!=8)
                                                <span style="font-size: 8px"
                                                      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{count($anahtarkelime->proje->where("durum_id","<","8"))-1}}
                                                    </span>
                                            @endif
                                        </a>
                                    @endforeach

                                    {{--@foreach($data->anahtarkelime as $anahtarkelime)
                                        <a href="javascript:void(0)" data-id="{{$data->id}}"
                                           class="tag">{{$anahtarkelime->kelime}}</a>
                                    @endforeach--}}
                                </div>
                            </div>
                        </div>
                        {{--Anahtar Kelime Modal--}}
                        <div class="modal fade" id="modalAnahtarKelime">
                            <div
                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg text-justify">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Anahtar kelime ile ilgili Projeler</h6>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
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
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
@section('js')
    <!-- Internal Dtree Treeview js -->
    <script src="{{asset("")}}assets/plugins/treeview/treeview2.js"></script>
    <!-- INTERNAL NOTIFY JS -->
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

            // ÖNERİ İŞLEMLERİ
            $("#oneribtn").click(function (e) {
                e.preventDefault();
                let oneriislemselect = $('#oneriislemselect option:selected').val();
                let onerineden = $('#onerineden').val();
                $.ajax({
                    type: "post",
                    url: "{{route("teacherverifiedproject")}}",
                    data: {
                        oneriislemselect: oneriislemselect,
                        onerineden: onerineden,
                        projeid: "{{$data->id}}",
                    },
                    success: function (data) {
                        notif(data);
                        if(data["type"]=="success")
                        {
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }

                    }
                });

            });
            // RAPOR TEZ İŞLEMLERİ
            $("#rprtezneden").hide();
            $("#rprteznedencheck").change(function () {
                if (this.checked) {
                    return $("#rprtezneden").toggle();
                }
                $("#rprtezneden").hide();
            });
            $(".rprtezcheck").prop("disabled", true);
            $(".rprtezcheck:checkbox").attr("checked", true);
            $("#rprtezislemselect").change(function () {
                if ($('#rprtezislemselect option:selected').val() == "8") {
                    $("#rprtezneden").show();
                    $("#rprteznedencheck").prop("disabled", true);
                } else {
                    $("#rprteznedencheck").prop("disabled", false);
                    $("#rprtezneden").hide();
                }
            });
            $("#rprtezbtn").click(function (e) {
                e.preventDefault();

                let rprtezislemselect = $('#rprtezislemselect option:selected').val();
                let rprtezneden = $('#rprtezneden').val();
                let rprtezcheck = [];
                $('.rprtezcheck').each(function (i, item) {
                    rprtezcheck[i] = item.value;
                });
                $.ajax({
                    type: "post",
                    url: "{{route("teacherverifiedproject")}}",
                    data: {
                        projeid: '{{$data->id}}',
                        rprtezcheck: rprtezcheck,
                        rprtezselect: rprtezislemselect,
                        rprtezneden: rprtezneden
                    },
                    success: function (data) {
                        notif(data);
                        if(data["type"]=="success")
                        {
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }

                    }
                });

            });

            // ANAHTAR KELİME İŞLEMLERİ
            let modal = $("#modalAnahtarKelime");
            let modalAnahtarKelime = new bootstrap.Modal(modal, {
                backdrop: "static"
            })
            $("#modalclose").click(function () {
                modalAnahtarKelime.toggle();
            })
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
        });
    </script>

@endsection
