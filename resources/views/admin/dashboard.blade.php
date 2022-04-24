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
                    <h1 class="page-title">Gösterge Paneli</h1>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Toplam Öğrenci</h6>
                                                <h2 class="mb-0 number-font">{{$toplamogrenci}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Toplam Danışman</h6>
                                                <h2 class="mb-0 number-font">{{$toplamdanisman}}</h2>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Önerilen Proje</h6>
                                                <h2 class="mb-0 number-font">{{$toplamproje}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Tamamlanan Proje</h6>
                                                <h2 class="mb-0 number-font">{{$tamamlananproje}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Son Projeler</div>
                            </div>
                            <div class="card-body scroll">
                                <div style="height: 740px" class="content vscroll">
                                    @foreach($projeler as $proje)
                                        <div class="d-flex overflow-visible mb-3 border">
                                            <div class="ps-2 flex-column">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="badge {{$proje->durum->stil}}">{{$proje->durum->adi}}</span>
                                                    <span  style="font-size: 9px" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$proje->updated_at->format("d.m.Y H:i")}}">{{\App\Traits\Support\StringTrait::timeConvert($proje->updated_at)}}</span>
                                                </div>
                                                <h4 class="mb-0">
                                                    <a href="{{route("teacherdetailproject",$proje->id)}}">{{\App\Traits\Support\StringTrait::strTitle(mb_substr($proje->adi, 0, 50, 'UTF-8'))}}...</a>
                                                </h4>
                                                <div class="text-justify">{{mb_substr($proje->amac,0,200,'UTF-8')}} <a
                                                            href="{{route("teacherdetailproject",$proje->id)}}">...</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-5">
                            <div class="card-header">
                                <div class="card-title">Son Raporlar</div>
                            </div>
                            <div class="card-body scroll">
                                <div style="height: 300px" class="content-1 vscroll">
                                    <ul class="notification">
                                        @foreach($projeler as $proje)
                                            @foreach($proje->rapor->where("no",1)->sortByDesc("updated_at") as $rapor)
                                                <li>
                                                    <div class="notification-time">
                                                        <span class="date">{{$rapor->updated_at->format("d/m")}}</span>
                                                        <span class="time">{{$rapor->updated_at->format("H:i")}}</span>
                                                    </div>
                                                    <div class="notification-icon">
                                                        <a href="#"></a>
                                                    </div>
                                                    <div class="notification-time-date mb-2 d-block d-md-none">
                                                        <span class="date">{{$rapor->updated_at->format("d/m")}}</span>
                                                        <span class="time ms-2">{{$rapor->updated_at->format("H:i")}}</span>
                                                    </div>
                                                    <div class="notification-body me-0">
                                                        <div class="media mt-0">
                                                            <div class="main-avatar avatar-md online">
                                                                <img alt="avatar" class="br-7"
                                                                     src="{{$proje->ogrenci->img}}">
                                                            </div>
                                                            <div class="media-body ms-3 d-flex">
                                                                <div class="">
                                                                    <h5 class="fs-15 text-dark fw-bold mb-0"><a
                                                                                href="{{route("detailstudent",$proje->ogrenci->id)}}">{{$proje->ogrenci->adi." ".$proje->ogrenci->soyadi}}</a>
                                                                    </h5>
                                                                    <h5 class="mb-0 fs-13 text-dark">
                                                                        <a href="{{route("teacherdetailproject",$proje->id)}}">Projesi</a> için rapor yükledi.</h5>
                                                                </div>
                                                                <div class="notify-time">
                                                                    <p data-bs-toggle="tooltip" data-bs-placement="right" title="{{$rapor->updated_at->format("d.m.Y H:i")}}" class="mb-0 text-muted fs-11">{{\App\Traits\Support\StringTrait::timeConvert($rapor->updated_at)}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5">
                            <div class="card-header">
                                <div class="card-title">Son Tezler</div>
                            </div>
                            <div class="card-body">
                                <div style="height: 300px"  class="content-2 vscroll">
                                    <ul class="notification">
                                        @foreach($projeler as $proje)
                                            @foreach($proje->tez->sortByDesc("updated_at") as $tez)
                                                <li>
                                                    <div class="notification-time">
                                                        <span class="date">{{$tez->updated_at->format("d/m")}}</span>
                                                        <span class="time">{{$tez->updated_at->format("H:i")}}</span>
                                                    </div>
                                                    <div class="notification-icon">
                                                        <a href="#"></a>
                                                    </div>
                                                    <div class="notification-time-date mb-2 d-block d-md-none">
                                                        <span class="date">{{$tez->updated_at->format("d/m")}}</span>
                                                        <span class="time ms-2">{{$tez->updated_at->format("H:i")}}</span>
                                                    </div>
                                                    <div class="notification-body me-0">
                                                        <div class="media mt-0">
                                                            <div class="main-avatar avatar-md online">
                                                                <img alt="avatar" class="br-7"
                                                                     src="{{$proje->ogrenci->img}}">
                                                            </div>
                                                            <div class="media-body ms-3 d-flex">
                                                                <div class="">
                                                                    <h5 class="fs-15 text-dark fw-bold mb-0">
                                                                        <a href="{{route("detailstudent",$proje->ogrenci->id)}}">{{$proje->ogrenci->adi." ".$proje->ogrenci->soyadi}}</a>
                                                                    </h5>
                                                                    <h5 class="fs-13 mb-0 text-dark">
                                                                        <a href="{{route("teacherdetailproject",$proje->id)}}">Projesi</a> için tez yükledi.</h5>
                                                                </div>
                                                                <div class="notify-time">
                                                                    <p data-bs-toggle="tooltip" data-bs-placement="right" title="{{$tez->updated_at->format("d.m.Y H:i")}}" class="mb-0 text-muted fs-11">{{\App\Traits\Support\StringTrait::timeConvert($tez->updated_at)}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
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
@section("js")
    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset("")}}assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="{{asset("")}}assets/plugins/p-scroll/pscroll-2.js"></script>
@endsection
