<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aciklama extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aciklama', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proje_id');
            $table->unsignedBigInteger('durum_id');
            $table->enum('turu',['proje',"rapor","tez"]);
            $table->text("aciklama");
            $table->timestamps();
            $table->foreign("proje_id")->references("id")->on('proje');
            $table->foreign("durum_id")->references("id")->on('durum');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aciklama');
    }
}
