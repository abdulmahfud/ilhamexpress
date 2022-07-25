<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('karyawans', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('id_user');
        //     $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        //     $table->string('nik')->nullable();
        //     $table->string('nama_lengkap')->nullable();
        //     $table->string('alamat')->nullable();
        //     $table->string('no_hp')->nullable();
        //     $table->string('jabatan')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('karyawans');
    }
}
