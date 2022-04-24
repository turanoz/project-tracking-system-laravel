<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;
    protected $table="anahtarkelime";
    public $timestamps = false;
    protected $guarded=[];

     public function proje()
     {
         return $this->belongsToMany(Project::class, 'anahtarkelime_proje',"anahtarkelime_id","proje_id");
     }
}
