<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\Project;
use App\Models\Report;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

function typeControlQuery($type, $where, $action, $query, $smessage, $emessage)
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

class StoreController extends Controller
{
    public function uploadreport(Request $request)
    {
        $id = $request->projeid;
        $proje = Project::whereId($id)->first();
        $reports = [["rpr1docx", "rpr1pdf"], ["rpr2docx", "rpr2pdf"], ["rpr3docx", "rpr3pdf"]];

        foreach ($reports as $report) {
            $path = [];
            $filename = [];
            foreach ($report as $key => $rpr) {
                $path[$key] = "reports/" . $proje->ogrenci_id . "/" . $proje->id . "/" . date("dmyhis") . "/" . $rpr[3];
                $filename[$key] = "rpr" . $rpr[3] . "." . $request->file($rpr)->getClientOriginalExtension();
                $request->file($rpr)->storeAs($path[$key], $filename[$key]);
            }
            Report::create(["no" => $rpr[3], "proje_id" => $id, "docx" => $path[0] . "/" . $filename[1], "pdf" => $path[0] . "/" . $filename[1], "durum_id" => "1"]);
        }
        Project::whereId($id)->update(["durum_id" => "4"]);
        return response()->json([
            "msg" => "<b>Başarılı:</b> Rapor dosyalarınız başarıyla gönderildi.",
            "type" => "success"
        ]);
    }

    public function uploadthesis(Request $request)
    {
        $id = $request->projeid;
        $proje = Project::whereId($id)->first();
        $theses = ["tezdocx", "tezpdf"];
        $filename = [];
        foreach ($theses as $key => $thesis) {
            $path = "theses/" . $proje->ogrenci_id . "/" . $proje->id . "/" . date("dmyhis");
            $filename[$key] = "tez" . "." . $request->file($thesis)->getClientOriginalExtension();
            $request->file($thesis)->storeAs($path, $filename[$key]);
        }
        Thesis::create(["proje_id" => $id, "docx" => $path . "/" . $filename[0], "pdf" => $path . "/" . $filename[1], "durum_id" => "1"]);

        Project::whereId($id)->update(["durum_id" => "4"]);

        return response()->json([
            "msg" => "<b>Başarılı:</b> Tez dosyalarınız başarıyla gönderildi.",
            "type" => "success"
        ]);
    }

    public function uploadimg(Request $request)
    {

        $type = Session::get("type");
        $id = Session::get("id");
        $path = "profile/" . $type;
        $filename = $id . "." . $request->file('profileimg')->getClientOriginalExtension();
        $request->file("profileimg")->storeAs($path, $filename);

        return typeControlQuery($type, ["id" => $id], 'update', ["img" => "/image?img=" . $path . "/" . $filename], "Profil resminiz başarıyla güncellendi", "Güncellenemedi");

    }

    public function displayImage()
    {
        $filename = $_GET['img'];
        $path = storage_path("app/" . $filename);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function download()
    {

        $bolunen = explode("/", $_GET['path']);
        $no = $bolunen[2];
        $tur = $bolunen[0];
        $kid = Session::get('id');
        $tip = Session::get('type');

        $goruldudata = Project::whereId($no)->first();

        if (!empty($_GET['path'])&& $kid == $goruldudata->danisman_id) {
            if ($tur == "reports") {
                $rapor = Report::where([["proje_id", $no], ["durum_id", "<=", 3]])->update(["durum_id" => 3]);
                if ($rapor) {
                    Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $goruldudata->ogrenci_id, "proje_id" => $goruldudata->id, "durum_id" => 3, "mesaj" => "Raporunuzu gördü."]);
                    return Storage::download($_GET['path']);
                }
            } else if ($tur == "theses") {
                $tez = Thesis::where([["proje_id", $no], ["durum_id", "<=", 3]])->update(["durum_id" => 3]);
                if ($tez) {
                    Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $goruldudata->ogrenci_id, "proje_id" => $goruldudata->id, "durum_id" => 3, "mesaj" => "Tezinizi gördü."]);
                    return Storage::download($_GET['path']);
                }
            } else {
                echo "Dosya bulunamadı...";
            }
        } else {
            if ($tur == "reports") {
                Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $goruldudata->ogrenci_id, "proje_id" => $goruldudata->id, "durum_id" => 3, "mesaj" => "Raporunuzu gördü."]);
                return Storage::download($_GET['path']);
            } else if ($tur == "theses") {
                Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $goruldudata->ogrenci_id, "proje_id" => $goruldudata->id, "durum_id" => 3, "mesaj" => "Tezinizi gördü."]);
                return Storage::download($_GET['path']);
            } else {
                echo "Dosya bulunamadı...";
            }
        }

        /*if (!empty($_GET['path'])) {
            return Storage::download($_GET['path']);
        } else {
            echo "Dosya bulunamadı...";
        }*/
    }
}
