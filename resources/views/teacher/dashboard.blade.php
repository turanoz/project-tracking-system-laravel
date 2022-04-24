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
                            {{--Tamamlanan Proje--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Tamamlanan Proje</h6>
                                                <h2 class="mb-0 number-font">{{$tamamlanancount}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Devameden Proje--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Devam eden Proje</h6>
                                                <h2 class="mb-0 number-font">{{$devamedencount}}</h2>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--Reddedilen Proje--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Reddedilen Proje</h6>
                                                <h2 class="mb-0 number-font">{{$redcount}}</h2>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--Toplam Öğrenci--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Toplam Öğrenci</h6>
                                                <h2 class="mb-0 number-font">{{$ogrencicount}}</h2>
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
                    {{--Son Projeler--}}
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Son Projeler</div>
                            </div>
                            <div class="card-body scroll">
                                <div class="content vscroll h-400">
                                    @foreach($data->ogrenci as $ogrenci)
                                        @foreach($ogrenci->proje->sortByDesc("updated_at") as $proje)
                                            <div class="card border p-0 shadow-none mb-2 ">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media mt-0">
                                                            <div class="media-user me-2">
                                                                <div class=""><img
                                                                            class="rounded-circle avatar avatar-md"
                                                                            src="{{$ogrenci->img}}"></div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0 mt-1">{{$ogrenci->adi." ".$ogrenci->soyadi}}</h6>
                                                                <small data-bs-toggle="tooltip" data-bs-placement="right" title="{{$proje->updated_at->format("d.m.Y H:i")}}" class="text-muted">{{\App\Traits\Support\StringTrait::timeConvert($proje->updated_at)}}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h6 class="fw-semibold mt-3 mb-0">
                                                            <a href="{{route("teacherdetailproject",$proje->id)}}">{{mb_convert_case($proje->adi, MB_CASE_TITLE, "UTF-8")}}</a>
                                                            <span class="badge {{$proje->durum->stil}} fs-8">{{$proje->durum->adi}}</span>
                                                        </h6>
                                                        <p class="mt-1 mb-0 fs-12 text-justify">{{mb_substr($proje->amac,0,250,'UTF-8')}}
                                                            <a class="text-dark" href="{{route("teacherdetailproject",$proje->id)}}">...</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Rapor--}}
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Son Raporlar</div>
                            </div>
                            <div class="card-body scroll">
                                <div class="content-1 vscroll h-400">
                                    <ul class="notification">
                                        @foreach($data->ogrenci as $ogrenci)
                                            @foreach($ogrenci->proje as $proje)
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
                                                                         src="{{$ogrenci->img}}">
                                                                </div>
                                                                <div class="media-body ms-3 d-flex">
                                                                    <div class="mt-2">
                                                                        <h6 style="font-size: 12px" class="text-dark fw-bold mb-0"><a
                                                                                    href="{{route("detailstudent",$ogrenci->id)}}">{{$ogrenci->adi." ".$ogrenci->soyadi}}</a>
                                                                        </h6>
                                                                        <p style="font-size: 10px; margin: 0; padding: 0" class="mb-0 text-dark">
                                                                            <a href="{{route("teacherdetailproject",$proje->id)}}">Projesi</a> için
                                                                            rapor yükledi.</p>
                                                                    </div>
                                                                    <div class="notify-time">
                                                                        <p style="padding: 0; margin: 0; font-size: 8px;" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$rapor->updated_at->format("d.m.Y H:i")}}">{{\App\Traits\Support\StringTrait::timeConvert($rapor->updated_at)}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Tez--}}
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Son Tezler</div>
                            </div>
                            <div class="card-body scroll">
                                <div class="content-2 vscroll h-400">
                                    <ul class="notification">
                                        @foreach($data->ogrenci as $ogrenci)
                                            @foreach($ogrenci->proje as $proje)
                                                @foreach($proje->tez->sortByDesc("id") as $tez)
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
                                                                         src="{{$ogrenci->img}}">
                                                                </div>
                                                                <div class="media-body ms-3 d-flex">
                                                                    <div class="mt-2">
                                                                        <h6 style="font-size: 12px" class="text-dark fw-bold mb-0"><a
                                                                                    href="{{route("detailstudent",$ogrenci->id)}}">{{$ogrenci->adi." ".$ogrenci->soyadi}}</a>
                                                                        </h6>
                                                                        <p style="font-size: 10px; margin: 0; padding: 0" class="mb-0 text-dark">
                                                                            <a href="{{route("teacherdetailproject",$proje->id)}}">Projesi</a> için
                                                                            tez yükledi.</p>
                                                                    </div>
                                                                    <div class="notify-time">
                                                                        <p style="padding: 0; margin: 0; font-size: 8px;" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$tez->updated_at->format("d.m.Y H:i")}}">{{\App\Traits\Support\StringTrait::timeConvert($tez->updated_at)}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
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
