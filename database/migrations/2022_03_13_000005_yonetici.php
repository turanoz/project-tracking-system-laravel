<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Yonetici extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yonetici', function (Blueprint $table) {
            $table->string("id",30)->primary();
            $table->string("adi",100);
            $table->string("soyadi",100);
            $table->string("unvan",100);
            $table->string("tel",13);
            $table->string("img",255)->default("/image?img=profile/default.jpg");
            $table->string("eposta",255)->unique();
            $table->string("sifre",255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yonetici');
    }
}
