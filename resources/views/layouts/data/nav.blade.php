<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{route("login")}}">
                <img src="{{asset('')}}assets/images/brand/logo.png" width="50px" height="50px"
                     class="header-brand-img desktop-logo" alt="logo">
                <img src="{{asset('')}}assets/images/brand/logo.png" width="50px" height="50px"
                     class="header-brand-img toggle-logo" alt="logo">
                <img src="{{asset('')}}assets/images/brand/logo.png" width="50px" height="50px"
                     class="header-brand-img light-logo" alt="logo">
                <img src="{{asset('')}}assets/images/brand/logo.png" width="50px" height="50px"
                     class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                     viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/>
                </svg>
            </div>

            @switch (\Illuminate\Support\Facades\Session::get("type"))
                @case("1")
                @include("layouts.navs.admin")
                @break
                @case("2")
                @include("layouts.navs.teacher")
                @break
                @case("3")
                @include("layouts.navs.student")
                @break
                @default
                Yetkisiz erişim
            @endswitch


            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                     viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
<!--/APP-SIDEBAR-->
