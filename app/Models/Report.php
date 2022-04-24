<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table="rapor";
    protected $guarded=[];


    public function durum(){
        return $this->hasOne(Status::class,"id","durum_id");
    }
    public function proje(){
        return $this->hasOne(Project::class,"id","proje_id");
    }

}
