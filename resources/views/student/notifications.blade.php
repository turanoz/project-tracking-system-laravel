@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Öğrenci | Bildirimler
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app ">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Bildirimler</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('login')}}">ANA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bildirimler</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <!-- Container -->
                <div class="container">
                    <ul class="notification">
                        @foreach($bildirimler as $bildirim)
                            <li>
                                <div class="notification-time">
                                    <span class="date">{{$bildirim->created_at->format('d/m')}}</span>
                                    <span class="time">{{$bildirim->created_at->format('H:i')}}</span>
                                </div>
                                <div class="notification-icon">
                                    <a href="javascript:void(0);"></a>
                                </div>
                                <div class="notification-time-date mb-2 d-block d-md-none">
                                    <span class="date">{{$bildirim->created_at->format('d/m')}}</span>
                                    <span class="time ms-2">{{$bildirim->created_at->format('H:i')}}</span>
                                </div>
                                <div class="notification-body">
                                    <div class="media mt-0">
                                        @if($bildirim->tip=="3")
                                        <div class="main-avatar avatar-md online">
                                            <img alt="avatar" class="br-7"
                                                 src="{{$ogrenci->where("id",$bildirim->kimden_id)[1]->img}}">
                                        </div>
                                        <div class="media-body ms-3 d-flex">
                                            <div class="">
                                                <p class="fs-15 text-dark fw-bold mb-0">{{$ogrenci->where("id",$bildirim->kimden_id)[1]->adi." ".$ogrenci->where("id",$bildirim->kimden_id)[1]->soyadi}}<span
                                                            class="badge {{$bildirim->durum->stil}} ms-3 px-2 pb-1 mb-1">{{$bildirim->durum->adi}}</span>
                                                </p>
                                                <h5 class="mb-0 fs-13 text-dark"><a href="{{route("studentdetailproject",$bildirim->proje_id)}}">{{$bildirim->mesaj}}</a></h5>
                                            </div>
                                            <div class="notify-time">
                                                <p class="mb-0 text-muted fs-11">{{$bildirim->created_at->format('H:i')}}</p>
                                            </div>
                                        </div>
                                        @elseif($bildirim->tip=="2")
                                            <div class="main-avatar avatar-md online">
                                                <img alt="avatar" class="br-7"
                                                     src="{{$danisman->where("id",$bildirim->kimden_id)->first()->img}}">
                                            </div>
                                            <div class="media-body ms-3 d-flex">
                                                <div class="">
                                                    <p class="fs-15 text-dark fw-bold mb-0">{{$danisman->where("id",$bildirim->kimden_id)->first()->adi." ".$danisman->where("id",$bildirim->kimden_id)->first()->soyadi}}<span
                                                                class="badge {{$bildirim->durum->stil}} ms-3 px-2 pb-1 mb-1">{{$bildirim->durum->adi}}</span>
                                                    </p>
                                                    <h5 class="mb-0 fs-13 text-dark"><a href="{{route("studentdetailproject",$bildirim->proje_id)}}">{{$bildirim->mesaj}}</a></h5>
                                                </div>
                                                <div class="notify-time">
                                                    <p class="mb-0 text-muted fs-11">{{$bildirim->created_at->format('H:i')}}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="main-avatar avatar-md online">
                                                <img alt="avatar" class="br-7"
                                                     src="{{$yonetici->where("id",$bildirim->kimden_id)[0]->img}}">
                                            </div>
                                            <div class="media-body ms-3 d-flex">
                                                <div class="">
                                                    <p class="fs-15 text-dark fw-bold mb-0">{{$yonetici->where("id",$bildirim->kimden_id)[0]->adi." ".$yonetici->where("id",$bildirim->kimden_id)[0]->soyadi}}<span
                                                                class="badge {{$bildirim->durum->stil}} ms-3 px-2 pb-1 mb-1">{{$bildirim->durum->adi}}</span>
                                                    </p>
                                                    <h5 class="mb-0 fs-13 text-dark"><a href="{{route("studentdetailproject",$bildirim->proje_id)}}">{{$bildirim->mesaj}}</a></h5>
                                                </div>
                                                <div class="notify-time">
                                                    <p class="mb-0 text-muted fs-11">{{$bildirim->created_at->format('H:i')}}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center my-4 d-flex justify-content-center">
                        {{$bildirimler->links()}}
                    </div>
                </div>
                <!-- End Container -->
                <!-- /Row -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
