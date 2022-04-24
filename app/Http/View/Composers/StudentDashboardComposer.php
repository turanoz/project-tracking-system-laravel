<?php

namespace App\Http\View\Composers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class StudentDashboardComposer
{
    public function compose(View $view)
    {
        $id = Session::get("id");
        $data = Student::whereId($id)->first();
        $categorys=DB::select("select durum_id,durum.adi,durum.stil,durum.ikon, count(*) as adet from proje,durum where proje.durum_id=durum.id and proje.ogrenci_id={$id} group by durum_id order by durum_id ASC");
        $view->with('categorys', $categorys);
        $view->with('data', $data);
    }
}
