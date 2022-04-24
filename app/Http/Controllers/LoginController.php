<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ForgotPassword;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        $type = Session::get("type");
        switch ($type) {
            case "1":
                return redirect("yonetici");
            case "2":
                return redirect("danisman");
            case "3":
                return redirect("ogrenci");
            default:
                return view('login');
        }
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $type = $request->type;

        if ($username != "" && $password != "") {
            switch ($type) {
                case "1":
                    $result = Admin::where([["eposta", $username], ["sifre", md5($password)]])->first();
                    if ($result) {
                        Session::put('id', $result->id);
                        Session::put('type', $type);
                        return response()->json([
                            "msg" => "<b>Başarılı:</b> Hoşgeldiniz sayın " . $result->adi . " " . $result->soyadi . ".",
                            "type" => "success",
                            "url" => "yonetici"
                        ]);
                    } else {
                        return response()->json([
                            "msg" => "<b>Hata:</b> Kullanıcı adı veya şifre yanlış.",
                            "type" => "error"
                        ]);
                    }
                case "2":
                    $result = Teacher::where([["eposta", $username], ["sifre", md5($password)]])->first();
                    if ($result) {
                        Session::put('id', $result->id);
                        Session::put('type', $type);
                        return response()->json([
                            "msg" => "<b>Başarılı:</b> Hoşgeldiniz sayın " . $result->adi . " " . $result->soyadi . ".",
                            "type" => "success",
                            "url" => "danisman"
                        ]);
                    } else {
                        return response()->json([
                            "msg" => "<b>Hata:</b> Kullanıcı adı veya şifre yanlış.",
                            "type" => "error"
                        ]);
                    }
                case "3":
                    $result = Student::where([["eposta", $username], ["sifre", md5($password)]])->first();
                    if ($result) {
                        Session::put('id', $result->id);
                        Session::put('type', $type);
                        return response()->json([
                            "msg" => "<b>Başarılı:</b> Hoşgeldiniz sayın " . $result->adi . " " . $result->soyadi . ".",
                            "type" => "success",
                            "url" => "ogrenci"
                        ]);
                    } else {
                        return response()->json([
                            "msg" => "<b>Hata:</b> Kullanıcı adı veya şifre yanlış.",
                            "type" => "error"
                        ]);
                    }
                default:
                    return response()->json([
                        "msg" => "<b>Hata:</b> Kullanıcı adı veya şifre yanlış.",
                        "type" => "error"
                    ]);
            }
        } else {
            return response()->json(["msg" => "Kullanıcı adı veya şifresi boş girilemez",
                "type" => "error"]);
        }


    }

    public function forgotpassword()
    {
        return view("forgotpassword");
    }

    public function forgotpasswordpost(Request $request)
    {

        $email = $request->eposta;
        $teacher = Teacher::whereEposta($email)->first();
        $student = Student::whereEposta($email)->first();
        $admin = Admin::whereEposta($email)->first();
        $key = md5(uniqid());
        if ($teacher) {
            $danisman = Teacher::whereEposta($email)->first();
            $info = Admin::whereBolum_id($danisman->bolum_id)->first();
            ForgotPassword::create(["eposta" => $email, "key" => md5(md5(md5($key))), "aktif" => 1]);
            $array = [
                'adsoyad' => $danisman->adi . " " . $danisman->soyadi,
                'key' => $key,
                'admin' => $info->adi . " " . $info->soyadi
            ];
            mail::send("email.forgetpassword", $array, function ($message) use ($email) {
                $message->subject('Şifre Sıfırla');
                $message->to($email);
            });
            return response()->json([
                "msg" => "<b>Başarılı:</b> Talimatlar mail adresine gönderildi.",
                "type" => "success"
            ]);
        } else if ($student) {
            $ogrenci = Student::whereEposta($email)->first();
            $info = Admin::whereBolum_id($ogrenci->bolum_id)->first();
            ForgotPassword::create(["eposta" => $email, "key" => md5(md5(md5($key))), "aktif" => 1]);
            $array = [
                'adsoyad' => $ogrenci->adi . " " . $ogrenci->soyadi,
                'key' => $key,
                'admin' => $info->adi . " " . $info->soyadi
            ];
            mail::send("email.forgetpassword", $array, function ($message) use ($email) {
                $message->subject('Şifre Sıfırla');
                $message->to($email);
            });
            return response()->json([
                "msg" => "<b>Başarılı:</b> Talimatlar mail adresine gönderildi.",
                "type" => "success"
            ]);
        } else if ($admin) {
            $yonetici = Admin::whereEposta($email)->first();
            $info = Admin::whereBolum_id($yonetici->bolum_id)->first();
            ForgotPassword::create(["eposta" => $email, "key" => md5(md5(md5($key))), "aktif" => 1]);
            $array = [
                'adsoyad' => $yonetici->adi . " " . $yonetici->soyadi,
                'key' => $key,
                'admin' => $info->adi . " " . $info->soyadi
            ];
            mail::send("email.forgetpassword", $array, function ($message) use ($email) {
                $message->subject('Şifre Sıfırla');
                $message->to($email);
            });
            return response()->json([
                "msg" => "<b>Başarılı:</b> Talimatlar mail adresine gönderildi.",
                "type" => "success"
            ]);
        } else {
            return response()->json([
                "msg" => "<b>Hata:</b> Böyle bir kullanıcı bulunmadı.",
                "type" => "error"
            ]);
        }
    }

    public function forgetpassword()
    {
        $key = $_GET['key'];
        if (!empty($_GET['key'])) {
            $forgotpassword = ForgotPassword::where([["key", md5(md5(md5($key)))], ["aktif", true]])->first();
            if ($forgotpassword) {
                ForgotPassword::where([["key", md5(md5(md5($key)))], ["aktif", true]])->update(["aktif" => false]);
                $eposta = $forgotpassword->eposta;

                $teacher = Teacher::whereEposta($eposta)->first();
                $student = Student::whereEposta($eposta)->first();
                $admin = Admin::whereEposta($eposta)->first();

                if ($teacher) {
                    return view("changepassword", $teacher);
                } else if ($student) {
                    return view("changepassword", $student);
                } else if ($admin) {
                    return view("changepassword", $admin);
                } else {
                    return response()->json([
                        "msg" => "<b>Hata:</b> Böyle bir kullanıcı bulunmadı.",
                        "type" => "error"
                    ]);
                }
            } else {
                echo "Link daha önce kullanılmış";
            }
        } else {
            echo "Yetkisiz erişim";
        }


    }

    public function forgetpasswordpost(Request $request)
    {

        $eposta = $request->eposta;
        $sifre = $request->sifre;

        $teacher = Teacher::whereEposta($eposta)->first();
        $student = Student::whereEposta($eposta)->first();
        $admin = Admin::whereEposta($eposta)->first();

        if ($eposta != "" && $sifre != "") {
            if ($teacher) {
                Teacher::whereEposta($eposta)->update(["sifre" => md5($sifre)]);
                return response()->json([
                    "msg" => "<b>Başarılı:</b> Şifreniz başarılı bir şekilde değiştirildi.",
                    "type" => "success"
                ]);
            } else if ($student) {
                Student::whereEposta($eposta)->update(["sifre" => md5($sifre)]);
                return response()->json([
                    "msg" => "<b>Başarılı:</b> Şifreniz başarılı bir şekilde değiştirildi.",
                    "type" => "success"
                ]);
            } else if ($admin) {
                Admin::whereEposta($eposta)->update(["sifre" => md5($sifre)]);
                return response()->json([
                    "msg" => "<b>Başarılı:</b> Şifreniz başarılı bir şekilde değiştirildi.",
                    "type" => "success"
                ]);
            } else {
                return response()->json([
                    "msg" => "<b>Hata:</b> Hatalı bir işlem yaptınız.",
                    "type" => "error"
                ]);
            }
        } else {
            return response()->json(["msg" => "Kullanıcı adı veya şifre boş bırakılamaz.",
                "type" => "error"]);
        }


    }

    function signout()
    {
        Session::flush();
        return redirect("/");
    }
}
