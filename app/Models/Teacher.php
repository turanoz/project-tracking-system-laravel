<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table="danisman";
    protected $guarded=[];


    public function ogrenci(){
        return $this->hasMany(Student::class,'danisman_id',"id");
    }

    public function proje(){
        return $this->hasMany(Project::class,'danisman_id',"id");
    }

    public function bolum(){
        return $this->hasOne(Branch::class,'id',"bolum_id");
    }

}
