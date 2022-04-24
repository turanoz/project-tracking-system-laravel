<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proje', function (Blueprint $table) {
            $table->id();
            $table->string("ogrenci_id",30);
            $table->string("danisman_id",30);
            $table->unsignedBigInteger("donem_id");
            $table->text("adi")->fullText();
            $table->text("amac")->fullText();
            $table->text("materyal")->fullText();
            $table->unsignedBigInteger("durum_id");
            $table->timestamps();
            $table->foreign("ogrenci_id")->references("id")->on("ogrenci");
            $table->foreign("danisman_id")->references("id")->on("danisman");
            $table->foreign("donem_id")->references("id")->on("donem");
            $table->foreign("durum_id")->references("id")->on("durum");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proje');
    }
}
