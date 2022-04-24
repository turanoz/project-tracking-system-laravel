<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="ogrenci";
    protected $guarded=[];

    public function proje(){
        return $this->hasMany(Project::class,'ogrenci_id',"id");
    }
    public function danisman(){
        return $this->hasOne(Teacher::class,'id',"danisman_id");
    }
    public function bolum(){
        return $this->hasOne(Branch::class,'id',"bolum_id");
    }
    public function durum(){
        return $this->belongsToMany(Status::class,'proje',"ogrenci_id","durum_id");
    }


}
