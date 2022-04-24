<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Akp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anahtarkelime_proje', function (Blueprint $table) {
            $table->unsignedBigInteger("proje_id");
            $table->unsignedBigInteger("anahtarkelime_id");
            $table->foreign("proje_id")->references("id")->on("proje")->onDelete("cascade");
            $table->foreign("anahtarkelime_id")->references("id")->on("anahtarkelime")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anahtarkelime_proje');
    }
}
