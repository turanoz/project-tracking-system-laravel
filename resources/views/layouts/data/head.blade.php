<!-- app-Header -->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
               href=""></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="{{route("login")}}">
                <img src="{{asset('')}}assets/images/brand/logo.png" width="50px" height="50px"
                     class="header-brand-img desktop-logo" alt="logo">
                <img src="{{asset('')}}assets/images/brand/logo.png" width="50px" height="50px"
                     class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->

            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">

                            <!-- NOTIFICATION -->
                            @if(\Illuminate\Support\Facades\Session::get("type")=="3")
                                <div class="dropdown d-flex notifications">
                                    <a class="nav-link icon" data-bs-toggle="dropdown"><i class="fe fe-bell"></i>
                                        @if(count($__bildirimler)>0)
                                        <span class="pulse-danger"></span>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <div class="drop-heading border-bottom">
                                            <div class="d-flex">
                                                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Bildirimler</h6>
                                            </div>
                                        </div>
                                        <div class="notifications-menu ps">
                                            @if(count($__bildirimler)>0)
                                            @foreach($__bildirimler as $__bildirim)
                                                <a class="dropdown-item d-flex bildirim" data-id="{{$__bildirim->id}}" href="{{route('studentdetailproject',$__bildirim->proje_id)}}">
                                                    <div class="me-3 notifyimg  {{$__bildirim->durum->stil}} brround box-shadow-primary">
                                                        <i style="margin-top: -5px" class="{{$__bildirim->durum->ikon}}"></i>
                                                    </div>
                                                    <div class="mt-1">
                                                        <h5 class="notification-label mb-1">{{$__bildirim->mesaj}}</h5>
                                                        <span class="notification-subtext">{{\App\Traits\Support\StringTrait::timeConvert($__bildirim->created_at)}}</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                            @else
                                                <a class="dropdown-item d-flex justify-content-center">
                                                    <div class="mt-1 text-center">
                                                        <h5 class="notification-label mb-1">Yeni bir bildirimin yok..</h5>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="dropdown-divider m-0"></div>
                                        <a href="{{route("studentnotification")}}"
                                           class="dropdown-item text-center p-3 text-muted">Tüm Bildirimleri Gör</a>
                                    </div>
                                </div>
                        @endif
                        <!-- SIDE-MENU -->
                            <div class="dropdown d-flex profile-1">
                                <a href="" data-bs-toggle="dropdown"
                                   class="nav-link leading-none d-flex">
                                    <img id="profileinfoimg" src="{{$profile_info["img"]}}" alt="profile-user"
                                         class="avatar  profile-user brround cover-image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fs-14 fw-semibold">{{$profile_info["adsoyad"]}}</h5>
                                            <small class="text-muted">{{$profile_info["unvan"]}}</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="{{route("editprofile")}}">
                                        <i class="dropdown-icon fe fe-user"></i> Profil Düzenle
                                    </a>
                                    <a class="dropdown-item" href="{{route("signout")}}">
                                        <i class="dropdown-icon fe fe-alert-circle"></i> Çıkış Yap
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- /app-Header -->


