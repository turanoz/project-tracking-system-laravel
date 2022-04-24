<ul class="side-menu">
    <li class="sub-category">
        <h3>ANA</h3>
    </li>
    <li class="slide">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{route("admin")}}"><i
                class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Gösterge Paneli</span></a>
    </li>
    <li class="slide">
        <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                class="side-menu__icon fe fe-users"></i><span
                class="side-menu__label">Öğrenciler</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu">
            <li class="side-menu-label1"><a href="#">Öğrenciler</a></li>
            <li><a href="{{route("adminstudent")}}" class="slide-item">Öğrenci İşlemleri</a></li>
        </ul>
    </li>
    <li class="slide">
        <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                class="side-menu__icon fe fe-briefcase"></i><span
                class="side-menu__label">Danışmanlar</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu">
            <li class="side-menu-label1"><a href="#">Danışmanlar</a></li>
            <li><a href="{{route("adminteacher")}}" class="slide-item">Danışman İşlemleri</a></li>
        </ul>
    </li>
    <li class="sub-category">
        <h3>Ayarlar</h3>
    </li>
    <li>
        <a class="side-menu__item" href="{{route("adminunivercity")}}">
            <i class="side-menu__icon fe fe-globe"></i>
            <span class="side-menu__label">Üniversite</span>
        </a>
    </li>
    <li>
        <a class="side-menu__item" href="{{route("adminperiod")}}">
            <i class="side-menu__icon lnr lnr-pie-chart"></i>
            <span class="side-menu__label">Dönemler</span>
        </a>
    </li>

</ul>
