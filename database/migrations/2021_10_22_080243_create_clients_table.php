<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('id_user');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('no_hp');
            $table->longtext('nama_kecamatan')->nullable();
            $table->longtext('nama_kabupaten')->nullable();
            $table->longtext('nama_provinsi')->nullable();
            $table->longtext('nama_desa')->nullable();
            $table->integer('kodepos')->nullable();
            $table->longtext('alamat')->nullable();
            $table->unsignedBigInteger('countries_id')->nullable()->default(1);
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
        Schema::dropIfExists('clients');
    }
}
