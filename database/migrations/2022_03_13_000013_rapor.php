<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rapor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("proje_id");
            $table->unsignedInteger("no");
            $table->text("docx");
            $table->text("pdf");
            $table->unsignedBigInteger("durum_id");
            $table->timestamps();
            $table->foreign("durum_id")->references("id")->on("durum");
            $table->foreign("proje_id")->references("id")->on("proje");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapor');
    }
}
