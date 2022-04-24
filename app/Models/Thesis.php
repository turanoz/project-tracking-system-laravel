<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $table="tez";
    protected $guarded=[];

    public function ogrenci(){
        return $this->belongsToMany(Student::class,"proje","proje_id","id");
    }
    public function proje(){
        return $this->hasOne(Project::class,"id","proje_id");
    }
    public function durum(){
        return $this->hasOne(Status::class,"id","durum_id");
    }

}
