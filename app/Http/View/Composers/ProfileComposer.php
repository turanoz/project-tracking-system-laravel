<?php

namespace App\Http\View\Composers;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProfileComposer
{
    public function compose(View $view)
    {
        $type = \Session::get("type");
        switch ($type) {
            case "1":
                $query = Admin::whereId(\Session::get('id'))->first();
                $data = [
                    "adsoyad" => $query->adi . " " . $query->soyadi,
                    "unvan" => $query->unvan,
                    "img" => $query->img,
                ];
                $view->with('profile_info', $data);
                break;
            case "2":
                $query = Teacher::whereId(\Session::get('id'))->first();
                $data = [
                    "adsoyad" => $query->adi . " " . $query->soyadi,
                    "unvan" => $query->unvan,
                    "img" => $query->img,
                ];
                $view->with('profile_info', $data);
                break;
            case "3":
                $query = Student::whereId(\Session::get('id'))->first();
                $query2 = Notification::where([["ogrenci_id",\Session::get('id')],["goruldu",0]])->orderBy("created_at","desc")->paginate(5);
                $data = [
                    "adsoyad" => $query->adi . " " . $query->soyadi,
                    "unvan" => "Öğrenci",
                    "img" => $query->img,
                ];
                $view->with('profile_info', $data)->with("__bildirimler",$query2);
                break;
            default:
                $view->with('profile_info', "401");
        }

    }
}
