<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bildirim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bildirim', function (Blueprint $table) {
            $table->id();
            $table->string("tip",1);
            $table->string("kimden_id",30);
            $table->string("ogrenci_id",30);
            $table->unsignedBigInteger("proje_id");
            $table->unsignedBigInteger("durum_id");
            $table->string("mesaj","255");
            $table->boolean("goruldu")->default(0);

            $table->foreign("proje_id")->references("id")->on("proje");
            $table->foreign("ogrenci_id")->references("id")->on("ogrenci");
            $table->foreign("durum_id")->references("id")->on("durum");
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
        Schema::dropIfExists('bildirim');
    }
}
