@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Danışman | Anasayfa
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Öğrencilerim</h1>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    @foreach($ogrencilerim as $ogrenci)
                    <div class="col-sm-6 col-md-12 col-lg-6 col-xl-3 text-center">
                        <div class="card">
                            <a href="{{route("detailstudent",$ogrenci->id)}}"><img class="card-img-top" style="width: 250px" src="{{$ogrenci->img}}" alt="{{$ogrenci->adi."".$ogrenci->soyadi}}"></a>
                            <div class="card-body d-flex flex-column">
                                <h4 class="text-center"><a href="{{route("detailstudent",$ogrenci->id)}}">{{$ogrenci->adi." ".$ogrenci->soyadi}}</a></h4>
                                <h6 class="text-center">{{$ogrenci->bolum->fakulte->adi}}</h6>
                                <h6 class="text-center">{{$ogrenci->bolum->adi}}</h6>
                                <h6 class="text-center"><a href="mailto:{{$ogrenci->eposta}}">{{$ogrenci->eposta}}</a></h6>
                                <h6 class="text-center">{{$ogrenci->tel}}</h6>
                                <div class="text-muted text-justify">

                                    <table class="table text-center">
                                        <thead>
                                        <th>Önerilen</th>
                                        <th>Reddedilen</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$ogrenci->proje->where("durum_id","<=",8)->count()}}</td>
                                            <td>{{$ogrenci->proje->where("durum_id","=",8)->count()}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
