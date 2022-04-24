<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bolum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolum', function (Blueprint $table) {
            $table->id();
            $table->string("adi",100);
            $table->unsignedBigInteger("fakulte_id");
            $table->foreign("fakulte_id")->references('id')->on("fakulte");
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
        Schema::dropIfExists('bolum');
    }
}