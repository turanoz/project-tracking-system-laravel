<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ogrenci extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrenci', function (Blueprint $table) {
            $table->string("id", 30)->primary();
            $table->string("adi", 100);
            $table->string("soyadi", 100);
            $table->unsignedBigInteger("bolum_id");
            $table->enum("sinif",["Hazırlık","1.Sınıf","2.Sınıf","3.Sınıf","4.Sınıf"]);
            $table->string("img",255)->default("/image?img=profile/default.jpg");
            $table->string("tel", 13);
            $table->string("danisman_id",30);
            $table->string("eposta", 255)->unique();
            $table->string("sifre",255)->default("71566d43bd45fd932fe256fee2f2ea78");;
            $table->timestamps();
            $table->foreign("bolum_id")->references("id")->on("bolum");
            $table->foreign("danisman_id")->references("id")->on("danisman");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrenci');
    }
}
