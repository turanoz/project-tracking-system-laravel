<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Branch;
use App\Models\Faculty;
use App\Models\ForgotPassword;
use App\Models\Period;
use App\Models\Project;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Traits\Support\StringTrait;

class AdminController extends Controller
{
    public function index()
    {

        $toplamogrenci = Student::get()->count();
        $toplamdanisman = Teacher::get()->count();
        $toplamproje = Project::get()->count();
        $tamamlananproje = Project::where("durum_id", 7)->get()->count();
        $projeler = Project::orderBy("updated_at", "DESC")->get();


        return view('admin.dashboard', compact("toplamogrenci", "toplamdanisman", "toplamproje", "tamamlananproje", "projeler"));
    }

    public function student()
    {
        $danisman = Teacher::get();
        $student = Student::paginate(10);
        $fakulteler = Faculty::get();

        return view('admin.actionstudent', compact("student", "danisman", "fakulteler"));
    }

    public function addstudent(Request $request)
    {
        $admin = Admin::whereId(Session::get("id"))->first();
        $id = $request->no;
        $adi = $request->adi;
        $soyadi = $request->soyadi;
        $danisman = $request->danisman;
        $sinif = $request->sinif;
        $bolum = $request->bolum;
        $tel = $request->tel;
        $eposta = $request->eposta;

        if ($danisman == "random") {
            $danismanquery = Teacher::where("bolum_id", $bolum)->get();
            do {
                $randdanisman = mt_rand(0, count($danismanquery) - 1);
                if (count($danismanquery[$randdanisman]->ogrenci) < 10) {
                    Student::create(["id" => $id, "adi" => $adi, "soyadi" => $soyadi, "danisman_id" => $danismanquery[$randdanisman]->id, "sinif" => $sinif, "bolum_id" => $bolum, "tel" => $tel, "eposta" => $eposta]);
                }
            } while (count($danismanquery[$randdanisman]->ogrenci) >= 10);
        } else {
            $danismandolumu = Teacher::whereId($danisman)->first();
            if (count($danismandolumu->ogrenci) < 10) {
                Student::create(["id" => $id, "adi" => $adi, "soyadi" => $soyadi, "danisman_id" => $danisman, "sinif" => $sinif, "bolum_id" => $bolum, "tel" => $tel, "eposta" => $eposta]);
            } else {
                return response()->json([
                    "msg" => "<b>Hata:</b> Seçtiğiniz öğretmenin kotası dolu.",
                    "type" => "error"
                ]);
            }
        }
        $key = md5(uniqid());

        ForgotPassword::create(["eposta" => $eposta, "key" => md5(md5(md5($key))), "aktif" => 1]);
        $array = [
            "adsoyad" => $adi . " " . $soyadi,
            "key" => $key,
            "admin" => $admin->adi . " " . $admin->soyadi
        ];
        mail::send("email.addaccount", $array, function ($message) use ($eposta) {
            $message->subject('Hesabınız oluşturuldu');
            $message->to($eposta);
        });


        return response()->json([
            "msg" => "<b>Başarılı:</b> Öğrenci bilgileri oluşturuldu.",
            "type" => "success"
        ]);

    }

    public function updatestudent(Request $request)
    {
        $admin = Admin::whereId(Session::get("id"))->first();
        $id = $request->no;
        $adi = $request->adi;
        $soyadi = $request->soyadi;
        $sinif = $request->sinif;
        $bolum = $request->bolum;
        $tel = $request->tel;
        $eposta = $request->eposta;
        $danisman = $request->danisman;

        $ogrenci = Student::whereId($id)->first();


        if ($danisman == "random") {
            $danismanquery = Teacher::where("bolum_id", $bolum)->get();
            do {
                $randdanisman = mt_rand(0, count($danismanquery) - 1);
                if (count($danismanquery[$randdanisman]->ogrenci) < 10) {
                    Student::where(["id" => $id])->update(["adi" => $adi, "soyadi" => $soyadi, "danisman_id" => $danismanquery[$randdanisman]->id, "sinif" => $sinif, "bolum_id" => $bolum, "tel" => $tel, "eposta" => $eposta]);
                }
            } while (count($danismanquery[$randdanisman]->ogrenci) >= 10);
        } else {
            $danismandolumu = Teacher::whereId($danisman)->first();
            if (count($danismandolumu->ogrenci) < 10 || $ogrenci->danisman_id == $danisman) {
                Student::where(["id" => $id])->update(["adi" => $adi, "soyadi" => $soyadi, "danisman_id" => $danisman, "sinif" => $sinif, "bolum_id" => $bolum, "tel" => $tel, "eposta" => $eposta]);
            } else {
                return response()->json([
                    "msg" => "<b>Hata:</b> Seçtiğiniz öğretmenin kotası dolu.",
                    "type" => "error"
                ]);
            }
        }

        $key = md5(uniqid());

        ForgotPassword::create(["eposta" => $eposta, "key" => md5(md5(md5($key))), "aktif" => 1]);
        $array = [
            'adsoyad' => $adi . " " . $soyadi,
            'key' => $key,
            "admin" => $admin->adi . " " . $admin->soyadi
        ];
        mail::send("email.updateaccount", $array, function ($message) use ($eposta) {
            $message->subject('Hesabınız güncellendi');
            $message->to($eposta);
        });


        return response()->json([
            "msg" => "<b>Başarılı:</b> Öğrenci bilgileri güncellendi.",
            "type" => "success"
        ]);

    }

    public function deletestudent(Request $request)
    {
        $admin = Admin::whereId(Session::get("id"))->first();
        $id = $request->no;
        $adi = $request->adi;
        $soyadi = $request->soyadi;
        $eposta = $request->eposta;

        Student::where(["id" => $id])->delete();

        $array = [
            'adsoyad' => $adi . " " . $soyadi,
            "admin" => $admin->adi . " " . $admin->soyadi
        ];
        mail::send("email.deleteaccount", $array, function ($message) use ($eposta) {
            $message->subject('Hesabınız Silindi');
            $message->to($eposta);
        });


        return response()->json([
            "msg" => "<b>Başarılı:</b> Öğrenci bilgileri silindi.",
            "type" => "success"
        ]);

    }

    public function searchstudent(Request $request)
    {
        if (gettype($request->ara) == "array") {
            foreach ($request->ara as $ara) {
                if ($ara != "") {
                    $kara = StringTrait::strlower($ara);
                    $query = Student::orWhere('adi', 'LIKE', '%' . $kara . '%')->orWhere('soyadi', 'LIKE', '%' . $kara . '%')->with(array('danisman' => function ($dns) {
                        $dns->select('id', "adi", 'soyadi');
                    }))->with(array('bolum' => function ($blm) {
                        $blm->select('id', "adi");
                    }))->get();
                    foreach ($query as $q) {
                        if ($q != "") {
                            $result[] = $q;

                        }

                    }
                }
            }
            $data = array_values(array_unique($result));
            $temp = array();
            foreach ($data as $key => $value) {
                $temp[$key] = $value['id']; // İd ye göre sıralama
            }
            array_multisort($temp, SORT_ASC, $data);
            return response()->json($data);
        } else {
            $kara = StringTrait::strlower($request->ara);
            $result = Student::orWhere('adi', 'LIKE', '%' . $kara . '%')->orWhere('soyadi', 'LIKE', '%' . $kara . '%')->with(array('danisman' => function ($dns) {
                $dns->select('id', "adi", 'soyadi');
            }))->with(array('bolum' => function ($blm) {
                $blm->select('id', "adi");
            }))->get();
            return response()->json($result);
        }
    }

    public function teacher()
    {
        $teacher = Teacher::paginate(10);
        $fakulteler = Faculty::get();
        return view('admin.actionteacher', compact("teacher", "fakulteler"));
    }

    public function listteacher(Request $request)
    {
        $bolum = $request->bolum;
        if ($bolum != "") {
            $result = Teacher::where("bolum_id", $bolum)->get();
            return response()->json($result);
        }
        return response()->json([
            "msg" => "<b>Hata:</b> Öğretmen listelenemedi",
            "type" => "error"
        ]);
    }

    public function addteacher(Request $request)
    {
        $admin = Admin::whereId(Session::get("id"))->first();
        $id = $request->no;
        $adi = $request->adi;
        $soyadi = $request->soyadi;
        $unvan = $request->unvan;
        $bolum = $request->bolum;
        $tel = $request->tel;
        $eposta = $request->eposta;

        Teacher::create(["id" => $id, "adi" => $adi, "soyadi" => $soyadi, "unvan" => $unvan, "bolum_id" => $bolum, "tel" => $tel, "eposta" => $eposta]);
        $key = md5(uniqid());

        ForgotPassword::create(["eposta" => $eposta, "key" => md5(md5(md5($key))), "aktif" => 1]);
        $array = [
            'adsoyad' => $adi . " " . $soyadi,
            'key' => $key,
            "admin" => $admin->adi . " " . $admin->soyadi
        ];
        mail::send("email.addaccount", $array, function ($message) use ($eposta) {
            $message->subject('Hesabınız oluşturuldu');
            $message->to($eposta);
        });


        return response()->json([
            "msg" => "<b>Başarılı:</b> Öğretmen oluşturuldu.",
            "type" => "success"
        ]);

    }

    public function updateteacher(Request $request)
    {
        $admin = Admin::whereId(Session::get("id"))->first();
        $id = $request->no;
        $adi = $request->adi;
        $soyadi = $request->soyadi;
        $unvan = $request->unvan;
        $bolum = $request->bolum;
        $tel = $request->tel;
        $eposta = $request->eposta;

        Teacher::where(["id" => $id])->update(["adi" => $adi, "soyadi" => $soyadi, "unvan" => $unvan, "bolum_id" => $bolum, "tel" => $tel, "eposta" => $eposta]);
        $key = md5(uniqid());

        ForgotPassword::create(["eposta" => $eposta, "key" => md5(md5(md5($key))), "aktif" => 1]);
        $array = [
            'adsoyad' => $adi . " " . $soyadi,
            'key' => $key,
            "admin" => $admin->adi . " " . $admin->soyadi
        ];
        mail::send("email.updateaccount", $array, function ($message) use ($eposta) {
            $message->subject('Hesabınız güncellendi');
            $message->to($eposta);
        });


        return response()->json([
            "msg" => "<b>Başarılı:</b> Öğretmen oluşturuldu.",
            "type" => "success"
        ]);

    }

    public function deleteteacher(Request $request)
    {
        $admin = Admin::whereId(Session::get("id"))->first();
        $id = $request->no;
        $adi = $request->adi;
        $soyadi = $request->soyadi;
        $eposta = $request->eposta;

        Teacher::where(["id" => $id])->delete();

        $array = [
            'adsoyad' => $adi . " " . $soyadi,
            "admin" => $admin->adi . " " . $admin->soyadi
        ];
        mail::send("email.deleteaccount", $array, function ($message) use ($eposta) {
            $message->subject('Hesabınız Silindi');
            $message->to($eposta);
        });


        return response()->json([
            "msg" => "<b>Başarılı:</b> Öğretmen oluşturuldu.",
            "type" => "success"
        ]);

    }

    public function searchteacher(Request $request)
    {
        if (gettype($request->ara) == "array") {
            foreach ($request->ara as $ara) {
                if ($ara != "") {
                    $kara = StringTrait::strlower($ara);
                    $query = Teacher::orWhere('adi', 'LIKE', '%' . $kara . '%')->orWhere('soyadi', 'LIKE', '%' . $kara . '%')->with(array('bolum' => function ($blm) {
                        $blm->select('id', "adi");
                    }))->get();
                    foreach ($query as $q) {
                        if ($q != "") {
                            $result[] = $q;

                        }

                    }
                }
            }
            $data = array_values(array_unique($result));
            $temp = array();
            foreach ($data as $key => $value) {
                $temp[$key] = $value['id']; // İd ye göre sıralama
            }
            array_multisort($temp, SORT_ASC, $data);
            return response()->json($data);
        } else {
            $kara = StringTrait::strlower($request->ara);
            $result = Teacher::orWhere('adi', 'LIKE', '%' . $kara . '%')->orWhere('soyadi', 'LIKE', '%' . $kara . '%')->with(array('bolum' => function ($blm) {
                $blm->select('id', "adi");
            }))->get();
            return response()->json($result);
        }
    }

    public function univercity()
    {
        $fakulteler = Faculty::get();
        $bolumler = Branch::get();
        return view("admin.univercity", compact("fakulteler", "bolumler"));
    }

    public function branchlist(Request $request)
    {
        $fakulte = $request->fakulte;
        if ($fakulte != "") {
            $result = Branch::where("fakulte_id", $fakulte)->get();
            return response()->json($result);
        }
        return response()->json([
            "msg" => "<b>Hata:</b> Bölüm listelenemedi",
            "type" => "error"
        ]);
    }

    public function branchadd(Request $request)
    {
        $fakulte = $request->fakulte;
        $bolum = $request->bolum;
        if ($fakulte != "" && $bolum != "") {
            Branch::create(["adi" => $bolum, "fakulte_id" => $fakulte]);
            return response()->json([
                "msg" => "<b>Başarılı:</b> Bölüm ilgili fakülte altında oluşturuldu.",
                "type" => "success"
            ]);
        }
        return response()->json([
            "msg" => "<b>Hata:</b> Bölüm oluşturulamadı",
            "type" => "error"
        ]);
    }

    public function facultyadd(Request $request)
    {
        $fakulte = $request->fakulte;
        if ($fakulte != "") {
            Faculty::create(["adi" => $fakulte]);
            return response()->json([
                "msg" => "<b>Başarılı:</b> Fakülte oluşturuldu.",
                "type" => "success"
            ]);
        }
        return response()->json([
            "msg" => "<b>Hata:</b> Fakülte oluşturulamadı",
            "type" => "error"
        ]);
    }

    public function period($id = "")
    {
        $donemler = Period::orderBy("aktif", "DESC")->get();
        $getactiveperiod = Period::where("aktif", 1)->first();
        if (!$getactiveperiod) {
            return view("admin.period", compact('donemler'));
        }

        if ($id) {
            $projeler = Project::where('donem_id', $id)
                ->with([
                    'danisman:id,adi,soyadi',
                    'ogrenci:id,adi,soyadi,bolum_id',
                    'ogrenci.bolum:id,adi'
                ])
                ->orderBy('updated_at', "DESC")->paginate(5);
            return view("admin.period", compact("projeler", "donemler"));
        }

        $projeler = Project::where('donem_id', $getactiveperiod->id)
            ->with([
                'danisman:id,adi,soyadi',
                'ogrenci:id,adi,soyadi,bolum_id',
                'ogrenci.bolum:id,adi'
            ])
            ->orderBy('updated_at', "DESC")->paginate(5);
        return view("admin.period", compact("projeler", "donemler"));
    }

    public function addperiod(Request $request)
    {
        if ($request->donem) {

            $result = Period::create(["adi" => $request->donem]);
            if ($result) {
                return response()->json(["msg" => "Dönem başarılı bir şekilde oluşturuldu", "type" => "success"]);
            } else {
                return response()->json(["msg" => "Dönem oluşturulamadı", "type" => "error"]);

            }

        }
    }

    public function activeperiod(Request $request)
    {
        if ($request->donem) {

            Period::where("aktif", 1)->update(["aktif" => 0]);
            $result = Period::where("id", $request->donem)->update(["aktif" => 1]);

            if ($result) {
                return response()->json(["msg" => "Dönem başarılı bir şekilde aktifleştirildi.", "type" => "success"]);
            } else {
                return response()->json(["msg" => "Dönem aktifleştirilemedi.", "type" => "error"]);

            }

        }
    }


}
