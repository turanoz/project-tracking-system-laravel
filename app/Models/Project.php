<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table="proje";
    protected $guarded=[];
    public function anahtarkelime()
    {
        return $this->belongsToMany(Keyword::class, 'anahtarkelime_proje',"proje_id","anahtarkelime_id");
    }

    public function danisman(){
        return $this->hasOne(Teacher::class,"id","danisman_id");
    }
    public function ogrenci(){
        return $this->hasOne(Student::class,"id","ogrenci_id");
    }
    public function donem(){
        return $this->hasOne(Period::class,"id","donem_id");
    }
    public function rapor(){
        return $this->hasMany(Report::class,"proje_id","id");
    }
    public function tez(){
        return $this->hasMany(Thesis::class,"proje_id","id");
    }
    public function aciklama(){
        return $this->hasMany(Comment::class,"proje_id","id");
    }
    public function durum(){
        return $this->hasOne(Status::class,"id","durum_id");
    }



}
