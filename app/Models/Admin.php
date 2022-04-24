<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table="yonetici";

    public function bolum(){
        return $this->hasOne(Branch::class,'id',"bolum_id");
    }
}
