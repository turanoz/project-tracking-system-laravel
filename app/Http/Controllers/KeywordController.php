<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KeywordController extends Controller
{
    public function keywordproject(Request $request)
    {

        $anahtarkelime = $request->anahtarkelime;
        $projeid = $request->projeid;

        $data = Keyword::whereId($anahtarkelime)->get();
        if (Session::get("type")==3)
        {
            foreach ($data as $item) {
                $result = $item->proje->where("durum_id","!=",8)->where("id","!=",$projeid);
                foreach ($result as $project)
                {
                    echo "
                            <div class='card border p-0 shadow-none mb-3'>
                                <div class='card-body'>
                                    <div class='d-flex'>
                                        <div class='media mt-0'>
                                            <div class='media-user me-2'>
                                                <div class=''>
                                                    <img alt='' class='rounded-circle avatar avatar-md' src='" . $project->ogrenci->img. "'>
                                                </div>
                                            </div>
                                            <div class='media-body'>
                                                <h6 class='mb-0 mt-1'>".$project->ogrenci->adi." ".$project->ogrenci->soyadi."</h6>
                                                <small class='text-muted'>" . $project->created_at->format("d.m.Y") . "</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='mt-4'>
                                        <h4 class='fw-semibold mt-3 mb-0'><a href='".route("studentdetailproject",$project->id)."'>" . $project->adi . "</a></h4>
                                        <p class='mb-0 text-justify'>" . mb_substr($project->amac, 0, 250,'UTF-8') . "
                                            <a href='".route("studentdetailproject",$project->id)."'>...</a>
                                        </p>
                                    </div>
                                </div>
                                <div class='card-footer user-pro-2'>
                                    <div class='tags'>";
                                        foreach ($project->anahtarkelime as $anahtarkelime) {
                                            echo "<span class='tag' >$anahtarkelime->kelime</span>";
                                        }
                    echo "</div></div></div>";
                }
            }
        }
        else
        {
        foreach ($data as $item) {
            $result = $item->proje->where("durum_id","!=",8)->where("id","!=",$projeid);
            foreach ($result as $project)
            {
                echo "
                        <div class='card border p-0 shadow-none mb-3'>
                            <div class='card-body'>
                                <div class='d-flex'>
                                    <div class='media mt-0'>
                                        <div class='media-user me-2'>
                                            <div class=''>
                                                <img alt='' class='rounded-circle avatar avatar-md' src='" . $project->ogrenci->img. "'>
                                            </div>
                                        </div>
                                        <div class='media-body'>
                                            <h6 class='mb-0 mt-1'>".$project->ogrenci->adi." ".$project->ogrenci->soyadi."</h6>
                                            <small class='text-muted'>" . $project->updated_at->format("d.m.Y") . "</small>
                                        </div>
                                    </div>
                                </div>
                                <div class='mt-4'>
                                    <h4 class='fw-semibold mt-3 mb-0'><a href='".route("teacherdetailproject",$project->id)."'>" . $project->adi . "</a></h4>
                                    <p class='mb-0 text-justify'>" . mb_substr($project->amac, 0, 250,'UTF-8') . "
                                        <a href='".route("teacherdetailproject",$project->id)."'>...</a>
                                    </p>
                                </div>
                            </div>
                            <div class='card-footer user-pro-2'>
                                <div class='tags'>";
                                    foreach ($project->anahtarkelime as $anahtarkelime) {
                                        echo "<span  class='tag ' >$anahtarkelime->kelime</span>";
                                    }
                echo "</div></div></div>";

            }
        }

        }
    }
}
