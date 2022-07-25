<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTrackingmoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typepakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paket_name');
            $table->timestamps();
        });
        Schema::create('pengiriman_trackingmores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('pengirim_id');
            $table->unsignedBigInteger('penerima_id');
            $table->unsignedBigInteger('courires_id');
            $table->unsignedBigInteger('typepaket_id');
            $table->unsignedBigInteger('countries_id');
            $table->string('tgl_kirim');
            $table->string('tracking_number');
            $table->string('order_number');
            $table->string('logistics_channel');
            $table->string('keterangan');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->integer('jumlah');
            $table->integer('berat');
            $table->decimal('total_biaya', 16, 2);
            $table->string('status')->default('0');
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
        Schema::dropIfExists('typepakets');
        Schema::dropIfExists('pengiriman_trackingmores');
    }
}
