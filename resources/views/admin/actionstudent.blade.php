@extends('layouts.app')
@section('title')
    Kocaeli Üniversitesi Proje Takip Sistemi | Öğrenci | Öğrenci İşlemleri
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Öğrenciler</h1>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <!-- Row -->
                <div class="row row-cards">
                    <div class="col-lg-12 col-xl-12">
                        <div class="input-group mb-5">
                            <input id="ara" type="text" class="form-control" placeholder="Ara">
                            <div id="arabtn" class="input-group-text btn btn-primary">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm align-middle">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th class="text-center">Resim</th>
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Danışman</th>
                                            <th>Bölüm</th>
                                            <th>Sınıf</th>
                                            <th>Tel</th>
                                            <th>Eposta</th>
                                        </tr>
                                        </thead>
                                        <tbody id="ogrenci-list">
                                        @foreach($student as $students)
                                            <tr>
                                                <td>{{$students->id}}</td>
                                                <td><img class="avatar" src="{{$students->img}}" alt=""></td>
                                                <td>{{$students->adi}}</td>
                                                <td>{{$students->soyadi}}</td>
                                                <td data-tid="{{$students->danisman->id}}">{{$students->danisman->adi." ".$students->danisman->soyadi}}</td>
                                                <td data-fid="{{$students->bolum->fakulte_id}}"
                                                    data-bid="{{$students->bolum->id}}">{{$students->bolum->adi}}</td>
                                                <td>{{$students->sinif}}</td>
                                                <td>{{$students->tel}}</td>
                                                <td>{{$students->eposta}}</td>
                                            </tr>
                                        @endforeach

                                        <caption>
                                            <button type="button" class="btn btn-sm" id="plusButton">
                                                <i class="fa fa-2x fa-plus"></i>
                                            </button>
                                        </caption>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 mb-2 pt-0 d-flex justify-content-end">
                            {{$student->links()}}
                        </div>

                        <!--AddOrUpdate Modal-->
                        <div class="modal fade" id="islemlerModal" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1"
                             aria-labelledby="islemlerModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="islemlerModalLabel">Öğrenci Düzenle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class=" col-lg-6  col-md-12">
                                                    <div class="form-group">
                                                        <label for="no">No</label>
                                                        <input type="text" class="form-control" id="no">
                                                    </div>
                                                </div>
                                                <div class=" col-lg-6  col-md-12">
                                                    <div class="form-group">
                                                        <label for="no">Danışman Öğretmen</label>
                                                        <select class="form-control" id="danisman">
                                                            <option value="random">Rastgele Ata</option>
                                                            {{--@foreach($danisman as $dns)
                                                            <option value="{{$dns->id}}">{{$dns->adi." ".$dns->soyadi}}</option>
                                                            @endforeach--}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="ad">Ad</label>
                                                        <input type="text" class="form-control" id="adi">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="soyadi">Soyad</label>
                                                        <input type="text" class="form-control" id="soyadi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="sinif">Sınıf</label>
                                                        <select id="sinif" class="form-control">
                                                            <option value="Hazırlık">Hazırlık</option>
                                                            <option value="1.Sınıf">1. Sınıf</option>
                                                            <option value="1.Sınıf">2. Sınıf</option>
                                                            <option value="3.Sınıf">3. Sınıf</option>
                                                            <option value="4.Sınıf">4. Sınıf</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label for="fakulte">Fakülte</label>
                                                                <select id="fakulte" class="form-control">
                                                                    <option value="">Seçiniz</option>
                                                                    @foreach($fakulteler as $fakulte)
                                                                        <option value="{{$fakulte->id}}">{{$fakulte->adi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label for="bolum">Bölüm</label>
                                                                <select class="form-control" id="bolum">
                                                                    <option value="">Seçiniz</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="eposta">E-posta Adresi</label>
                                                        <input type="email" class="form-control" id="eposta">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="tel">Telefon Numarası</label>
                                                        <input type="number" class="form-control" id="tel">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">İptal
                                        </button>
                                        <button type="button" id="ekle"
                                                class="btn btn-success">Ekle
                                        </button>
                                        <button type="button" id="sil"
                                                class="btn btn-danger updateDeleteButton">Sil
                                        </button>
                                        <button type="button" id="guncelle"
                                                class="btn btn-primary updateDeleteButton">Güncelle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- COL-END -->
                </div>
                <!-- /Row -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
@section("js")
    <!-- INTERNAL NOTIFY JS -->
    <script src="{{asset("")}}assets/plugins/notify/js/rainbow.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="{{asset("")}}assets/plugins/notify/js/notifIt.js"></script>
    <!-- SELECT2 JS -->
    <script src="{{asset('')}}assets/plugins/select2/select2.full.min.js"></script>
    <script>
        $(document).ready(function () {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const Selectors = {
                no: "#no",
                adi: "#adi",
                soyadi: "#soyadi",
                danisman: "#danisman",
                sinif: "#sinif",
                bolum: "#bolum",
                fakulte: "#fakulte",
                tel: "#tel",
                eposta: "#eposta",
                ogrenciList: "#ogrenci-list",
                ogrenciListItems: "#item-list tr",
                btnAddModal: "#plusButton",
                btnAdd: "#ekle",
                btnDelete: "#sil",
                btnUpdate: "#guncelle",
                formModal: "#islemlerModal",
                lblModal: "#islemlerModalLabel",
                alertBox: "#uyari"
            }
            const displayAddModal = (e) => {
                document.querySelector(Selectors.no).value = "";
                document.querySelector(Selectors.no).disabled = false;
                document.querySelector(Selectors.adi).value = "";
                document.querySelector(Selectors.soyadi).value = "";
                document.querySelector(Selectors.danisman).selectedIndex = 0;
                document.querySelector(Selectors.sinif).value = "";
                document.querySelector(Selectors.bolum).selectedIndex = 0;
                document.querySelector(Selectors.tel).value = "";
                document.querySelector(Selectors.eposta).value = "";
                document.querySelector(Selectors.lblModal).textContent = "Öğrenci Ekle";
                document.querySelector(Selectors.btnAdd).style.display = "block";
                document.querySelector(Selectors.btnDelete).style.display = "none";
                document.querySelector(Selectors.btnUpdate).style.display = "none";
                let modal = document.querySelector(Selectors.formModal);
                let modalObj = new bootstrap.Modal(modal, {});
                modalObj.show();
                e.preventDefault();
            }
            const displayUpdateDeleteModal = (e) => {
                let temp = e.target;
                while (true) {
                    if (temp.tagName !== "TR") {
                        temp = temp.parentNode;
                    } else break;
                }
                document.querySelector(Selectors.no).value = temp.children[0].textContent;
                document.querySelector(Selectors.no).disabled = true;
                document.querySelector(Selectors.adi).value = temp.children[2].textContent;
                document.querySelector(Selectors.soyadi).value = temp.children[3].textContent;

                $(Selectors.fakulte).val(temp.children[5].getAttribute("data-fid"))

                const fakulte = $("#fakulte").val();
                if (fakulte != "") {
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('branchlistpost')}}",
                        data: {
                            fakulte: fakulte,
                        },
                        success: function (data) {
                            $("#bolum").html(`<option value="">Seçiniz</option>`);
                            for (var i = 0; i < data.length; i++) {
                                var html = `<option value="${data[i]["id"]}">${data[i]["adi"]}</option>`;
                                $("#bolum").append(html);
                            }
                            if (data['type'] == "error") {
                                notif(data);
                            }
                            $("#bolum").val(temp.children[5].getAttribute("data-bid"));
                            const bolum = $("#bolum").val();
                            if (bolum != "") {
                                $.ajax({
                                    type: "post",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "{{route('teacherlistpost')}}",
                                    data: {
                                        bolum: bolum,
                                    },
                                    success: function (data) {
                                        $("#danisman").html(`<option value="random">Rastgele Ata</option>`);
                                        for (var i = 0; i < data.length; i++) {
                                            var html = `<option value="${data[i]["id"]}">${data[i]["adi"] + " " + data[i]["soyadi"]}</option>`;
                                            $("#danisman").append(html);
                                        }
                                        if (data['type'] == "error") {
                                            notif(data);
                                        }
                                        $("#danisman").val(temp.children[4].getAttribute("data-tid"));
                                    }
                                });
                            } else {
                                $("#danisman").html(`<option value="random">Rastgele Ata</option>`);
                            }
                        }
                    });
                } else {
                    $("#bolum").html(`<option value="">Seçiniz</option>`);
                }

                document.querySelector(Selectors.sinif).value = temp.children[6].textContent;
                document.querySelector(Selectors.tel).value = temp.children[7].textContent;
                document.querySelector(Selectors.eposta).value = temp.children[8].textContent;

                document.querySelector(Selectors.lblModal).textContent = "Öğrenci Güncelle - Sil";
                document.querySelector(Selectors.btnAdd).style.display = "none";
                document.querySelector(Selectors.btnDelete).style.display = "block";
                document.querySelector(Selectors.btnUpdate).style.display = "block";


                let modal = document.querySelector(Selectors.formModal);
                let modalObj = new bootstrap.Modal(modal, {});
                modalObj.show();

                e.preventDefault();

            }
            // add product modal
            document.querySelector(Selectors.btnAddModal).addEventListener("click", displayAddModal)
            //update-delete modal
            document.querySelector(Selectors.ogrenciList).addEventListener("click", displayUpdateDeleteModal)

        })

    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#fakulte").change(function (e) {
                e.preventDefault();
                const fakulte = $("#fakulte").val();
                if (fakulte != "") {
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('branchlistpost')}}",
                        data: {
                            fakulte: fakulte,
                        },
                        success: function (data) {
                            $("#bolum").html(`<option value="">Seçiniz</option>`);
                            $("#danisman").html(`<option value="random">Rastgele Ata</option>`);
                            for (var i = 0; i < data.length; i++) {
                                var html = `<option value="${data[i]["id"]}">${data[i]["adi"]}</option>`;
                                $("#bolum").append(html);
                            }
                            if (data['type'] == "error") {
                                notif(data);
                            }
                        }
                    });
                } else {
                    $("#bolum").html(`<option value="">Seçiniz</option>`);
                    $("#danisman").html(`<option value="random">Rastgele Ata</option>`);
                }

            });
            $("#bolum").change(function (e) {
                e.preventDefault();
                const bolum = $("#bolum").val();
                if (bolum != "") {
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('teacherlistpost')}}",
                        data: {
                            bolum: bolum,
                        },
                        success: function (data) {
                            $("#danisman").html(`<option value="random">Rastgele Ata</option>`);
                            for (var i = 0; i < data.length; i++) {
                                var html = `<option value="${data[i]["id"]}">${data[i]["adi"] + " " + data[i]["soyadi"]}</option>`;
                                $("#danisman").append(html);
                            }
                            if (data['type'] == "error") {
                                notif(data);
                            }
                        }
                    });
                } else {
                    $("#danisman").html(`<option value="random">Rastgele Ata</option>`);
                }

            });
            $("#ekle").click(function (e) {
                e.preventDefault();

                const no = $("#no").val();
                const adi = $("#adi").val();
                const soyadi = $("#soyadi").val();
                const danisman = $("#danisman").val();
                const sinif = $("#sinif").val();
                const bolum = $("#bolum").val();
                const tel = $("#tel").val();
                const eposta = $("#eposta").val();

                if (no !== "" &&
                    adi !== "" &&
                    soyadi !== "" &&
                    danisman !== "" &&
                    sinif !== "" &&
                    bolum !== "" &&
                    tel !== "" &&
                    eposta !== "") {
                    $.ajax({
                        type: "post",
                        url: "{{route('addStudentPost')}}",
                        data: {
                            no: no,
                            adi: adi,
                            soyadi: soyadi,
                            danisman: danisman,
                            sinif: sinif,
                            bolum: bolum,
                            tel: tel,
                            eposta: eposta,
                        },
                        success: function (data) {
                            notif(data);
                            if (data["type"] == "success") {
                                setTimeout(function () {
                                    location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    notif({
                        "msg": "Lütfen boş alan bırakmayınız.",
                        "type": "error"
                    })
                }

            });
            $("#guncelle").click(function (e) {
                e.preventDefault();

                const no = $("#no").val();
                const adi = $("#adi").val();
                const soyadi = $("#soyadi").val();
                const danisman = $("#danisman").val();
                const sinif = $("#sinif").val();
                const bolum = $("#bolum").val();
                const tel = $("#tel").val();
                const eposta = $("#eposta").val();

                if (no !== "" &&
                    adi !== "" &&
                    soyadi !== "" &&
                    danisman !== "" &&
                    sinif !== "" &&
                    bolum !== "" &&
                    tel !== "" &&
                    eposta !== "") {
                    $.ajax({
                        type: "post",
                        url: "{{route('updateStudentPost')}}",
                        data: {
                            no: no,
                            adi: adi,
                            soyadi: soyadi,
                            danisman: danisman,
                            sinif: sinif,
                            bolum: bolum,
                            tel: tel,
                            eposta: eposta,
                        },
                        success: function (data) {
                            notif(data);
                            if (data["type"] == "success") {
                                notif(data);
                                setTimeout(function () {
                                    location.reload();
                                }, 2000)
                            }
                        }
                    });
                } else {
                    notif({
                        "msg": "Lütfen boş alan bırakmayınız.",
                        "type": "error"
                    })
                }

            });
            $("#sil").click(function (e) {
                e.preventDefault();

                const no = $("#no").val();
                const adi = $("#adi").val();
                const soyadi = $("#soyadi").val();
                const tel = $("#tel").val();
                const eposta = $("#eposta").val();

                if (no !== "" &&
                    adi !== "" &&
                    soyadi !== "" &&
                    tel !== "" &&
                    eposta !== "") {
                    $.ajax({
                        type: "post",
                        url: "{{route('deleteStudentPost')}}",
                        data: {
                            no: no,
                            adi: adi,
                            soyadi: soyadi,
                            tel: tel,
                            eposta: eposta,
                        },
                        success: function (data) {
                            if (data["type"] == "success") {
                                setTimeout(function () {
                                    location.reload();
                                }, 2000)

                                notif(data);

                            }
                        }
                    });
                } else {
                    notif({
                        "msg": "Lütfen boş alan bırakmayınız.",
                        "type": "error"
                    })
                }

            });
            $("#arabtn").click(function (e) {
                e.preventDefault();

                const ara = $("#ara").val().indexOf(" ") >= 0 ? $("#ara").val().split(" ") : $("#ara").val();
                if (ara !== "") {
                    $.ajax({
                        type: "post",
                        url: "{{route('searchStudentPost')}}",
                        data: {
                            ara: ara,
                        },
                        success: function (data) {
                            $("#ogrenci-list").html('');
                            for (var i = 0; i < data.length; i++) {

                                $("#ogrenci-list").append(
                                    `
                                  <tr>
                                                <td>${data[i]['id']}</td>
                                                <td><img class="avatar" src="${data[i]['img']}" alt=""></td>
                                                <td>${data[i]['adi']}</td>
                                                <td>${data[i]['soyadi']}</td>
                                                <td>${data[i]['danisman']['adi']} ${data[i]['danisman']['soyadi']}</td>
                                                <td>${data[i]['bolum']['adi']}</td>
                                                <td>${data[i]['sinif']}</td>
                                                <td>${data[i]['tel']}</td>
                                                <td>${data[i]['eposta']}</td>
                                            </tr>
                                  `
                                );
                            }
                        }
                    });
                } else {
                    location.reload();
                }

            });
        });
    </script>

@endsection
