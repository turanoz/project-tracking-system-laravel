<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

function TypeControlQuery($type, $where, $action, $query, $smessage, $emessage)
{
    if ($type == 1) {
        if (Admin::where($where)->$action($query)) {
            return response()->json([
                "msg" => "<b>Başarılı:</b> " . $smessage,
                "type" => "success"
            ]);
        } else {
            return response()->json([
                "msg" => "<b>Hata:</b> " . $emessage,
                "type" => "error"
            ]);
        }

    } elseif ($type == 2) {
        if (Teacher::where($where)->$action($query)) {
            return response()->json([
                "msg" => "<b>Başarılı:</b> " . $smessage,
                "type" => "success"
            ]);
        } else {
            return response()->json([
                "msg" => "<b>Hata:</b> " . $emessage,
                "type" => "error"
            ]);
        }

    } elseif ($type == 3) {
        if (Student::where($where)->$action($query)) {
            return response()->json([
                "msg" => "<b>Başarılı:</b> " . $smessage,
                "type" => "success"
            ]);
        } else {
            return response()->json([
                "msg" => "<b>Hata:</b> " . $emessage,
                "type" => "error"
            ]);
        }

    } else {
        return response()->json([
            "msg" => "<b>Hata:</b> Yetkisiz erişim",
            "type" => "error"
        ]);
    }

}

class ProfileController extends Controller
{
    public function index()
    {
        $type = Session::get("type");
        $id = Session::get("id");
        switch ($type) {
            case "1":
                $data = Admin::whereId($id)->first();
                return view("editprofile", compact("data"));
            case "2":
                $data = Teacher::whereId($id)->first();
                return view("editprofile", compact("data"));
            case "3":
                $data = Student::whereId($id)->first();
                return view("editprofile", compact("data"));
            default:
                return redirect('401');
        }

    }

    public function editprofile(Request $request)
    {

        $id = Session::get("id");
        $type = Session::get("type");

        $eposta = $request->eposta;
        $tel = $request->tel;
        $sinif = $request->sinif;

        if ($eposta != "" && $tel != "") {
            if ($sinif) {
                return TypeControlQuery($type, ["id" => $id], 'update', ["eposta" => $eposta, "tel" => "$tel", "sinif" => $sinif], "Bilgileriniz başarıyla güncellendi", "Güncellenemedi");
            } else {
                return TypeControlQuery($type, ["id" => $id], 'update', ["eposta" => $eposta, "tel" => "$tel"], "Bilgileriniz başarıyla güncellendi", "Güncellenemedi");

            }
        }
        return response()->json(
            ["msg" => "<b>Hata:</b> Eposta veya Telefon Numarası boş bırakılamaz.",
                "type" => "error"]);


    }

    public function editprofileimg(Request $request)
    {

        $id = Session::get("id");
        $type = Session::get("type");
        $img = $request->img;

        if ($img) {
            return TypeControlQuery($type, ["id" => $id], 'update', ["img" => $img], "Profil resminiz başarıyla güncellendi", "Güncellenemedi");
        } else {
            echo "Resim yüklenmesi başarısız..";
        }

    }

    public function editprofilepass(Request $request)
    {

        $type = Session::get("type");
        $id = Session::get("id");
        $msifre = $request->msifre;

        $ysifre = $request->ysifre;
        $ysifretekrar = $request->ysifretekrar;

        if ($ysifre === $ysifretekrar) {
            $gsifre = $ysifre;
        } else {
            return response()->json([
                "msg" => "<b>Hata:</b> Şifreler birbirini tutmuyor",
                "type" => "error"
            ]);
        }
        if ($msifre == "") {
            return response()->json([
                "msg" => "<b>Hata:</b> Mevcut şifre boş girilmez",
                "type" => "error"
            ]);
        }
        if ($ysifre == "" || $ysifretekrar == "") {
            return response()->json([
                "msg" => "<b>Hata:</b> Yeni şifre boş girilmez",
                "type" => "error"
            ]);
        }

        return TypeControlQuery($type, [["id", $id], ["sifre", md5($msifre)]], 'update', ["sifre" => md5($gsifre)], "Şifreniz başarıyla güncellendi", " Girdiğiniz şifre yanlış");


    }


}
