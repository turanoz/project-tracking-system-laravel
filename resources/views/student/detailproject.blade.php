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
                                <div class="text-end">{{$data->donem->adi}}</div>
                                <div class="text-end">{{$data->created_at->format('d.m.Y')}}</div>

                                @if(\Illuminate\Support\Facades\Session::get('id')!=$data->ogrenci_id)
                                    <span class="badge {{$devamedenproje->stil}}  fs-12">{{$devamedenproje->adi}}</span>
                                @else
                                    <span class="badge {{$data->durum->stil}}  fs-12">{{$data->durum->adi}}</span>
                                @endif
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">{{$data->adi}}</h1>
                                <h5 class="fw-bold">Projenin amacı,önemi ve kapsamı:</h5>
                                <p class="text-justify">{{$data->amac}}</p>
                                <h5 class="fw-bold">Materyal, yöntem ve araştırma olanakları:</h5>
                                <p class="text-justify">{{$data->materyal}}</p>
                                @if(count($data->aciklama->where("durum_id",10))>0)
                                    <h5 class="fw-bold">Onay Sebepleri</h5>
                                    @foreach($data->aciklama->where("durum_id",10) as $aciklama)
                                        <div class="card mb-3">
                                            <div class="card-body p-2 text-start">
                                                <blockquote class="quote">
                                                    <p class="fs-12 mb-0 pb-0">{{$aciklama->aciklama}}</p>
                                                    <small class="text-muted pt-0 mt-0">
                                                        {{$aciklama->turu}}
                                                        <cite>{{$aciklama->created_at->format("d.m.Y H:i")}}</cite>
                                                    </small>
                                                </blockquote>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if(count($data->aciklama->where("durum_id",8))>0)
                                    <h5 class="fw-bold">Red Sebepleri</h5>
                                    @foreach($data->aciklama->where("durum_id",8) as $aciklama)
                                        <div class="card mb-3">
                                            <div class="card-body p-2 text-start">
                                                <blockquote class="quote">
                                                    <p class="fs-12 mb-0 pb-0">{{$aciklama->aciklama}}</p>
                                                    <small class="text-muted pt-0 mt-0">
                                                        {{$aciklama->turu}} <cite
                                                                title="Source Title">{{$aciklama->created_at->format("d.m.Y H:i")}}</cite>
                                                    </small>
                                                </blockquote>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        @if($data->ogrenci_id!=\Illuminate\Support\Facades\Session::get("id"))
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
                                                <a href="javascript:void(0)"
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
                        <div class="card mb-2">
                            <div class="card-header p-2">
                                <div class="card-title">Raporlar ve Tezler</div>
                            </div>
                            {{--RAPOR VE TEZLER--}}
                            <div class="card-body ms-2 p-2">
                                <!-- col -->
                                <div class="my-0">
                                    <ul id="tree2">
                                        <li><a href="#">Raporlar</a>
                                            <ul>
                                                @foreach($raporlar as $key=>$rapor)
                                                    <li><a href="#">Rapor {{$key}}</a>
                                                        <ul>
                                                            @foreach($rapor as $raporalt)
                                                                <li>
                                                                    <a href="#">{{$raporalt->created_at->format('dmyhi')}}</a><span
                                                                            class="badge {{$raporalt->durum->stil}} fs-8 ms-1">{{$raporalt->durum->adi}}</span>
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
                                                        <ul>
                                                            <li>
                                                                <a href="{{route("download")}}?path={{$tez->docx}}">{{$tez->created_at->format('dmy')}}
                                                                    .docx</a></li>
                                                            <li>
                                                                <a href="{{route("download")}}?path={{$tez->pdf}}">{{$tez->created_at->format('dmy')}}
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

                        @if($data->durum->id==5 && $data->ogrenci_id==\Illuminate\Support\Facades\Session::get("id"))
                            <div class="card mb-2">
                                <div class="card-header p-2">
                                    <div class="card-title">Rapor Yükle</div>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="projeid" value="{{$data->id}}">
                                    {{--Rapor1--}}
                                    <div class="form-group">
                                        <span class="lead me-3">Rapor 1:</span>
                                        <label for="rpr1pdf">
                                            <i class="fa fa-file-pdf-o fa-2x me-2"></i>
                                        </label>
                                        <label for="rpr1docx">
                                            <i class="fa fa-file-word-o fa-2x"></i>
                                        </label>
                                        <input class="form-control" type="file" id="rpr1pdf" name="rpr1pdf"
                                               accept="application/pdf">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                        <input class="form-control" type="file" id="rpr1docx" name="rpr1docx"
                                               accept=".docx">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                    </div>
                                    {{--Rapor2--}}
                                    <div class="form-group">
                                        <span class="lead me-3">Rapor 2:</span>
                                        <label for="rpr2pdf">
                                            <i class="fa fa-file-pdf-o fa-2x me-2"></i>
                                        </label>
                                        <label for="rpr2docx">
                                            <i class="fa fa-file-word-o fa-2x"></i>
                                        </label>
                                        <input class="form-control" type="file" name="rpr2pdf" id="rpr2pdf"
                                               accept="application/pdf">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                        <input class="form-control" type="file" id="rpr2docx" name="rpr2docx"
                                               accept=".docx">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                    </div>
                                    {{--Rapor3--}}
                                    <div class="form-group">
                                        <span class="lead me-3">Rapor 3:</span>
                                        <label for="rpr3pdf">
                                            <i class="fa fa-file-pdf-o fa-2x me-2"></i>
                                        </label>
                                        <label for="rpr3docx">
                                            <i class="fa fa-file-word-o fa-2x"></i>
                                        </label>
                                        <input class="form-control" type="file" name="rpr3pdf" id="rpr3pdf"
                                               accept="application/pdf">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                        <input class="form-control" type="file" id="rpr3docx" name="rpr3docx"
                                               accept=".docx">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                    </div>
                                    <button id="rprYukle" class="btn btn-primary">Yükle</button>
                                </div>
                            </div>
                        @elseif($data->durum->id==6 && $data->ogrenci_id==\Illuminate\Support\Facades\Session::get("id"))
                            <div class="card mb-2">
                                <div class="card-header p-2">
                                    <div class="card-title">Tez Yükle</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <span class="lead me-3">Tez:</span>
                                        <label for="tezpdf">
                                            <i class="fa fa-file-pdf-o fa-2x me-2"></i>
                                        </label>
                                        <label for="tezdocx">
                                            <i class="fa fa-file-word-o fa-2x"></i>
                                        </label>
                                        <input class="form-control" type="file" id="tezpdf" name="tezpdf"
                                               accept="application/pdf">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                        <input class="form-control" type="file" id="tezdocx" name="tezdocx"
                                               accept=".docx">
                                        <h6><span></span><a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                        </h6>
                                    </div>
                                    <button id="tezYukle" class="btn btn-primary">Yükle</button>
                                    </form>
                                </div>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
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
@section('stil')

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet"/>

@endsection
@section('js')
    <!-- Internal Dtree Treeview js -->
    <script src="{{asset("")}}assets/plugins/dtree/dtree.js"></script>
    <script src="{{asset("")}}assets/plugins/dtree/dtree1.js"></script>
    <script src="{{asset("")}}assets/plugins/treeview/treeview.js"></script>
    <!-- Internal NOTIFY js -->
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
            $('input[type="file"]').hide();
            $('.form-group h6').hide();
            $('input[type="file"]').change(function (e) {
                var fileName = e.target.files[0].name;
                e.target.nextElementSibling.children[0].innerText = "";
                e.target.nextElementSibling.style.display = "block";
                e.target.nextElementSibling.children[0].innerText = fileName;
                e.target.nextElementSibling.children[1].display = "block";
            });

            $('.fe-x').click(function (e) {
                e.target.parentElement.parentElement.previousElementSibling.value = "";
                e.target.parentElement.parentElement.style.display = "none";
                e.preventDefault();
            });

            $('#rprYukle').click(function () {

                // Get the selected file
                var rpr1docx = $('#rpr1docx')[0].files;
                var rpr1pdf = $('#rpr1pdf')[0].files;
                var rpr2docx = $('#rpr2docx')[0].files;
                var rpr2pdf = $('#rpr2pdf')[0].files;
                var rpr3docx = $('#rpr3docx')[0].files;
                var rpr3pdf = $('#rpr3pdf')[0].files;

                if (rpr1pdf.length > 0 && rpr2pdf.length > 0 && rpr3pdf.length > 0 && rpr1docx.length > 0 && rpr2docx.length > 0 && rpr3docx.length > 0) {
                    var fd = new FormData();
                    // Append data
                    fd.append('rpr1docx', rpr1docx[0]);
                    fd.append('rpr1pdf', rpr1pdf[0]);
                    fd.append('rpr2docx', rpr2docx[0]);
                    fd.append('rpr2pdf', rpr2pdf[0]);
                    fd.append('rpr3docx', rpr3docx[0]);
                    fd.append('rpr3pdf', rpr3pdf[0]);


                    fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    fd.append('projeid', '{{$data->id}}');


                    // AJAX request
                    $.ajax({
                        url: "{{route("studentuploadreport")}}",
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
                } else {
                    notif({
                        msg: "Lütfen dosyaları eksiksiz seçtiğinizden emin olun.",
                        type: "error"
                    });
                }

            });
            $('#tezYukle').click(function () {

                // Get the selected file

                var tezdocx = $('#tezdocx')[0].files;
                var tezpdf = $('#tezpdf')[0].files;

                if (tezdocx.length > 0 && tezpdf.length > 0) {
                    var fd = new FormData();
                    // Append data
                    fd.append('tezdocx', tezdocx[0]);
                    fd.append('tezpdf', tezpdf[0]);


                    fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    fd.append('projeid', '{{$data->id}}');


                    // AJAX request
                    $.ajax({
                        url: "{{route("studentuploadthesis")}}",
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
                } else {
                    notif({
                        msg: "Lütfen dosyaları eksiksiz seçtiğinizden emin olun.",
                        type: "error"
                    });
                }

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
        });
    </script>

@endsection
