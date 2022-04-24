<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Notification;
use App\Models\Project;
use App\Models\Report;
use App\Models\Status;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function index()
    {

        $id = Session::get("id");

        $data = Teacher::whereId($id)->first();
        foreach ($data->proje as $proje){
            $ogrenci[]=$proje->ogrenci;
        }


        $projects = Project::where("danisman_id", $id)->get();
        foreach ($projects as $project) {
            $proje = Project::where([["id", "=", $project->id], ["durum_id", "<", "2"]])->update(["durum_id" => 2]);
            if ($proje) {
                Notification::create(["tip" => Session::get('type'), "kimden_id" => Session::get('id'), "ogrenci_id" => $project->ogrenci_id, "proje_id" => $project->id, "durum_id" => 2, "mesaj" => "Projeniz öğretmeninize teslim edildi"]);
            }
            $rapor = Report::where([["proje_id", $project->id], ["durum_id", "=", 1]])->update(["durum_id" => 2]);
            if ($rapor) {
                Notification::create(["tip" => Session::get('type'), "kimden_id" => Session::get('id'), "ogrenci_id" => $project->ogrenci_id, "proje_id" => $project->id, "durum_id" => 2, "mesaj" => "Yüklediğiniz raporlar öğretmeninize teslim edildi"]);
            }
            $tez = Thesis::where([["proje_id", $project->id], ["durum_id", "=", 1]])->update(["durum_id" => 2]);
            if ($tez) {
                Notification::create(["tip" => Session::get('type'), "kimden_id" => Session::get('id'), "ogrenci_id" => $project->ogrenci_id, "proje_id" => $project->id, "durum_id" => 2, "mesaj" => "Yüklediğiniz tez öğretmeninize teslim edildi"]);
            }
        }

        $data = Teacher::whereId($id)->first();
        //Toplam Öğrenci Sayısı
        $ogrencicount = $data->ogrenci->count();
        //Toplam Reddedilen Proje Sayısı
        $redcount = 0;
        //Toplam Devam Eden Proje Sayısı
        $devamedencount = 0;
        //Toplam Tamamlanan Proje Sayısı
        $tamamlanancount = 0;
        //Toplam Proje Sayısı
        $toplamcount = 0;
        foreach ($data->ogrenci as $ogrenci) {
            $devamedencount += $ogrenci->proje->where("durum_id", "<", 7)->count();
            $tamamlanancount += $ogrenci->proje->where("durum_id", 7)->count();
            $toplamcount += $ogrenci->proje->where("durum_id", "<=", 8)->count();
            $redcount += $ogrenci->proje->where("durum_id", 8)->count();
        }
        return view("teacher.dashboard", compact("redcount", "devamedencount", "tamamlanancount", "toplamcount", "ogrencicount", "data"));
    }
    public function detailproject($no)
    {
        $kid=Session::get('id');
        $tip=Session::get('type');
        $teacher = Teacher::whereId(Session::get("id"))->first();
        $goruldudata=Project::whereId($no)->first();

        if ($kid==$goruldudata->danisman_id)
        {
            $proje=Project::where([["id", "=", $no], ["durum_id", "<=", "3"], ["danisman_id", "=", $teacher->id]])->update(["durum_id" => "3"]);
            if ($proje){
                Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $goruldudata->ogrenci_id, "proje_id" => $goruldudata->id, "durum_id" => 3, "mesaj" => "Projenizi gördü."]);
            }
        }else{
            Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $goruldudata->ogrenci_id, "proje_id" => $goruldudata->id, "durum_id" => 3, "mesaj" => "Projenizi gördü."]);
        }

        $devamedenproje = Status::whereId("9")->first();
        $raporlar = Report::whereProje_id($no)->orderBy("created_at", "asc")->get()->groupBy("no")->all();
        $data = Project::whereId($no)->first();
        return view("detailproject", compact("data", "devamedenproje", "raporlar"));
    }
    public function detailprojects()
    {
        $teacher = Project::whereDanisman_id(Session::get('id'))->get();
        $projectstatus = Project::whereDanisman_id(Session::get('id'))->get();
        $project = Project::where("danisman_id", Session::get('id'))->paginate(3);

        return view("detailprojects", compact('projectstatus', "project", "teacher"));
    }
    public function statusListProject($id, $no)
    {
        $ogrenci = Student::whereId($id)->first();
        $ogrenci_project = Project::where(["durum_id" => $no, "ogrenci_id" => $id])->paginate(2);
        return view("detailstudent", compact('ogrenci_project', "ogrenci"));
    }
    public function statusListProjects($id)
    {
        $teacher = Project::whereDanisman_id(Session::get('id'))->get();
        $projectstatus = Project::whereDanisman_id(Session::get('id'))->get();
        $project = Project::where(["durum_id" => $id, "danisman_id" => Session::get('id')])->paginate(5);
        return view("detailprojects", compact('project', "projectstatus", "teacher"));
    }
    public function verifiedproject(Request $request)
    {
        $projeid = $request->projeid;
        $rprtezselect = $request->rprtezselect;
        $rprtezneden = $request->rprtezneden;
        $rprtezcheck = $request->rprtezcheck;
        $oneriislemselect = $request->oneriislemselect;
        $onerineden = $request->onerineden;
        $proje = Project::where("id", $projeid)->first();
        $tip = Session::get("type");
        $kid = Session::get('id');
        //ONERİ İŞLEMLERİ
        if ($oneriislemselect != "") {

            if ($onerineden == "" && $oneriislemselect == "8") {
                return response()->json([
                    "msg" => "<b>Hata:</b> Açıklama boş bırakılamaz.",
                    "type" => "error"
                ]);
            }

            if ($oneriislemselect == "5") { //Onaylandı Rapor Bekleniyor
                Project::where("id", $projeid)->update(["durum_id" => 5]);
                Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $proje->ogrenci_id, "proje_id" => $projeid, "durum_id" => 10, "mesaj" => "Önerdiğin proje onaylandı.Şimdi rapor yükleme alanına git."]);
                if ($onerineden != "") {
                    Comment::create(["proje_id" => $projeid, "durum_id" => 10, "turu" => "proje", "aciklama" => $onerineden]);
                }
                return response()->json([
                    "msg" => "<b>Başarılı:</b> İşleminiz gerçekleştirildi.",
                    "type" => "success"
                ]);
            } else if ($oneriislemselect == "8") {  //8 RED
                Project::where("id", $projeid)->update(["durum_id" => 8]);
                Comment::create(["proje_id" => $projeid, "durum_id" => 8, "turu" => "proje", "aciklama" => $onerineden]);
                Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $proje->ogrenci_id, "proje_id" => $projeid, "durum_id" => 8, "mesaj" => "Önerdiğin proje reddedildi."]);
                return response()->json([
                    "msg" => "<b>Başarılı:</b> İşleminiz gerçekleştirildi.",
                    "type" => "success"
                ]);
            } else {
                return response()->json([
                    "msg" => "<b>Hata:</b> Hatalı bir işlem yaptınız.",
                    "type" => "error"
                ]);
            }
        }
        //RAPOR İŞLEMLERİ
        else if (count($rprtezcheck) == 3)
        {
            //Reddedildiyse
            if ($rprtezselect == "8") {
                if ($rprtezneden != "") {
                    Report::where([["proje_id", $projeid], ["durum_id", "<=", 3]])->update(["durum_id" => 8]);
                    Project::whereId($projeid)->update(["durum_id" => 5]);
                    Comment::create(["proje_id" => $projeid,"durum_id"=>8,"turu"=>"rapor", "aciklama" => $rprtezneden]);
                    Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $proje->ogrenci_id, "proje_id" => $projeid, "durum_id" => 8, "mesaj" => "Gönderdiğin rapor reddedildi."]);
                    return response()->json([
                        "msg" => "<b>Başarılı:</b> Cevabınız öğrencimize ulaştırıldı.",
                        "type" => "success"
                    ]);
                } else {
                    return response()->json([
                        "msg" => "<b>Hata:</b> Lütfen reddedilme sebebi giriniz.",
                        "type" => "error"
                    ]);
                }
            } //Kabuledildiyse
            else if ($rprtezselect == "6") {
                Report::where([["proje_id", $projeid], ["durum_id", "<=", 3]])->update(["durum_id" => 10]);
                Project::whereId($projeid)->update(["durum_id" => 6]);
                if ($rprtezneden != "") {
                    Comment::create(["proje_id" => $projeid,"durum_id"=>10,"turu"=>"rapor", "aciklama" => $rprtezneden]);
                }
                Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $proje->ogrenci_id, "proje_id" => $projeid, "durum_id" => 10, "mesaj" => "Gönderdiğin rapor onaylandı, şimdi tez yükleme alanına git."]);
                return response()->json([
                    "msg" => "<b>Başarılı:</b> Onayınız başarıyla öğrencimize ulaştırıldı :).",
                    "type" => "success"
                ]);
            } //Hata
            else {
                return response()->json([
                    "msg" => "<b>Hata:</b> Bir hata oluştu !",
                    "type" => "error"
                ]);
            }
        }
        //TEZ İŞLEMLERİ
        else if (count($rprtezcheck) == 1)
        {
            //Reddedildiyse
            if ($rprtezselect == "8") {
                if ($rprtezneden != "") {
                    Thesis::where([["proje_id", $projeid], ["durum_id", "<=", 3]])->update(["durum_id" => 8]);
                    Project::whereId($projeid)->update(["durum_id" => 6]);
                    Comment::create(["proje_id" => $projeid,"durum_id"=>8,"turu"=>"tez", "aciklama" => $rprtezneden]);
                    Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $proje->ogrenci_id, "proje_id" => $projeid, "durum_id" => 8, "mesaj" => "Gönderdiğin tez reddedildi."]);
                    return response()->json([
                        "msg" => "<b>Başarılı:</b> Cevabınız öğrencimize ulaştırıldı.",
                        "type" => "success"
                    ]);
                } else {
                    return response()->json([
                        "msg" => "<b>Hata:</b> Lütfen reddedilme sebebi giriniz.",
                        "type" => "error"
                    ]);
                }
            } //Kabuledildiyse
            else if ($rprtezselect == "6") {
                Thesis::where([["proje_id", $projeid], ["durum_id", "<=", 3]])->update(["durum_id" => 10]);
                Project::whereId($projeid)->update(["durum_id" => 7]);
                if ($rprtezneden != "") {
                    Comment::create(["proje_id" => $projeid,"durum_id"=>10,"turu"=>"tez", "aciklama" => $rprtezneden]);
                }
                Notification::create(["tip" => $tip, "kimden_id" => $kid, "ogrenci_id" => $proje->ogrenci_id, "proje_id" => $projeid, "durum_id" => 7, "mesaj" => "Gönderdiğin tez onaylandı . Tebrikler projeniz onaylandı."]);

                return response()->json([
                    "msg" => "<b>Başarılı:</b> Öğrenciniz projeyi başarıyla tamamladı :)",
                    "type" => "success"
                ]);
            } //Hata
            else {
                return response()->json([
                    "msg" => "<b>Hata:</b> Bir hata oluştu !",
                    "type" => "error"
                ]);
            }
        }
        //HATA
        else
        {
            return response()->json([
                "msg" => "<b>Hata:</b> Yetkisiz Erişim.",
                "type" => "error"
            ]);
        }
    }
    public function mystudent()
    {
        $id = Session::get("id");
        $ogrencilerim = Student::where("danisman_id", $id)->paginate();
        return view("teacher.mystudent", compact("ogrencilerim"));
    }
    public function detailstudent($id)
    {
        $ogrenci = Student::whereId($id)->first();
        $ogrenci_project = Project::whereOgrenci_id($id)->orderBy('created_at', "desc")->paginate(2);
        return view("detailstudent", compact("ogrenci", "ogrenci_project"));
    }






}
