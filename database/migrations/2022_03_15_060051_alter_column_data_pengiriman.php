<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnDataPengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_pengiriman_pakets', function ($table){
            // $table->string('nama_desa_penerima')->after('nama_kecamatan_penerima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_pengiriman_pakets', function ($table){
            // $table->dropColumn('nama_desa_penerima');
            // $table->string('kodepos_pengirim')->change();
            // $table->string('potongan')->change();
        });
    }
}
