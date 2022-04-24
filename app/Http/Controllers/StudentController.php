<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Keyword;
use App\Models\Notification;
use App\Models\Period;
use App\Models\Project;
use App\Models\Report;
use App\Models\Status;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Traits\Support\StringTrait;

class StudentController extends Controller
{

    public function index()
    {
        $id = Session::get("id");

        /*$kelime=Keyword::where("kelime","Bilişim Suçları")->first();
        dd(count($kelime->proje));*/

        $dataProject = Project::whereOgrenci_id($id)->orderBy('created_at', "desc")->paginate(3);
        return view("student.dashboard", compact('dataProject'));
    }

    public function suggestProject(Request $request)
    {
        $adi = $request->projeadi;
        $amac = $request->projeamac;
        $materyal = $request->projemateryal;
        $donem_id = Period::whereAktif(1)->first();
        $ogrenci = Student::whereId(Session::get("id"))->first();
        $anahtarkelimeler = $request->anahtarkelimeler;

        if ($ogrenci->danisman_id == null) {
            return response()->json([
                "msg" => "<b>Hata:</b> Danışmanınız olmadığı için proje öneremezsiniz. :( ",
                "type" => "error"
            ]);
        }

        //AMAC KONTROL
        if (str_word_count($amac) < 200) {
            return response()->json([
                "msg" => "<b>Hata:</b> Proje amacını en az 200 kelime ile anlatmalısınız : " . str_word_count($amac),
                "type" => "error"
            ]);
        }
        if (str_word_count($amac) > 400) {
            return response()->json([
                "msg" => "<b>Hata:</b> Proje amacını en fazla 400 kelime ile anlatabilirsiniz : " . str_word_count($amac),
                "type" => "error"
            ]);
        }
        //MATERYAL KONTROL
        if (str_word_count($materyal) < 300) {
            return response()->json([
                "msg" => "<b>Hata:</b> Proje materyalini en az 300 kelime ile anlatmalısınız : " . str_word_count($materyal),
                "type" => "error"
            ]);
        }
        if (str_word_count($materyal) > 500) {
            return response()->json([
                "msg" => "<b>Hata:</b> Proje materyalini en fazla 500 kelime ile anlatabilirsiniz : " . str_word_count($materyal),
                "type" => "error"
            ]);
        }


        if ($anahtarkelimeler == null) {
            return response()->json(["msg" => "<b>Hata:</b> Anahtar kelime boş girilemez",
                "type" => "error"]);
        } else {
            if (count($anahtarkelimeler) < 5) {
                return response()->json([
                    "msg" => "<b>Hata:</b> En az 5 anahtar kelime girmelisiniz.",
                    "type" => "error"
                ]);
            } else if (count($anahtarkelimeler) > 5) {
                return response()->json([
                    "msg" => "<b>Hata:</b> En fazla 5 anahtar kelime girebilirsiniz.",
                    "type" => "error"
                ]);
            }
        }

        $anahtarkelimeid = [];

        foreach ($anahtarkelimeler as $index => $anahtarkelime) {
            $data = Keyword::where("kelime", $anahtarkelime)->first();
            if ($data) {
                $anahtarkelimeid[$index] = $data->id;
            } else {
                Keyword::create(["kelime" => $anahtarkelime]);
                $data = Keyword::where("kelime", $anahtarkelime)->first();
                $anahtarkelimeid[$index] = $data->id;
            }
        }

        Project::create(["ogrenci_id" => $ogrenci->id, "danisman_id" => $ogrenci->danisman_id, "donem_id" => $donem_id->id, "adi" => "$adi", "amac" => $amac, "materyal" => $materyal, "durum_id" => 1])->anahtarkelime()->attach($anahtarkelimeid);

        return response()->json([
            "msg" => "<b>Başarılı:</b> Projeniz ilgili öğretmene gönderildi.",
            "type" => "success"
        ]);
    }

    public function similarProject(Request $request){
        if ($request->similar="similar")
        {
            $data=Project::get();
            return response()->json($data);
        }
    }

    public function statusListProject($id)
    {
        $dataProject = Project::where(["durum_id" => $id, "ogrenci_id" => Session::get("id")])->paginate(3);
        return view("student.dashboard", compact('dataProject'));
    }

    public function detailProject($id)
    {
        $data = Project::whereId($id)->first();
        if ($data) {
            $raporlar = Report::whereProje_id($id)->orderBy("created_at", "asc")->get()->groupBy("no")->all();
            $devamedenproje = Status::whereId("9")->first();
            return view("student.detailproject", compact("data", "raporlar", "devamedenproje"));
        } else {
            return redirect("401");
        }

    }

    public function notifications()
    {
        $ogrenci = Student::get();
        $danisman = Teacher::get();
        $yonetici = Admin::get();
        $bildirimler = Notification::whereOgrenci_id(Session::get('id'))->orderBy("created_at", "DESC")->paginate(8);
        return view("student.notifications", compact('bildirimler', "ogrenci", "danisman", "yonetici"));
    }

    public function notificationeyes(Request $request){
        $bildirim_id=$request->bildirim_id;
        Notification::where("id",$bildirim_id)->update(["goruldu"=>1]);
    }


}
