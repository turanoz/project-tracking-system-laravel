<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table="bildirim";
    protected $guarded=[];
    public function durum(){
        return $this->hasOne(Status::class,"id","durum_id");
    }
}
