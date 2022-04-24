<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table="bolum";
    protected $guarded=[];
    public function fakulte(){
        return $this->hasOne(Faculty::class,"id","fakulte_id");
    }

}
