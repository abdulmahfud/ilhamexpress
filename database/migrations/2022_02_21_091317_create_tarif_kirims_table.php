<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifKirimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lokasi');
            $table->longtext('nama_kecamatan_pengirim');
            $table->longtext('nama_kabupaten_pengirim');
            $table->longtext('nama_provinsi_pengirim');
            $table->timestamps();
        });
        Schema::create('tarif_kirims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('origin_id');
            $table->string('tujuan');
            $table->longtext('nama_kabupaten_penerima');
            $table->longtext('nama_kecamatan_penerima');
            $table->string('min_kg');
            $table->string('max_kg');
            $table->string('layanan');
            $table->string('tarif');
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
        Schema::dropIfExists('origins');
        Schema::dropIfExists('tarif_kirims');
    }
}
