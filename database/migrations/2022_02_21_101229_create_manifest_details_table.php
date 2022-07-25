<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifest_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('manifests_id');
            $table->foreign('manifests_id')->references('id')->on('manifests')->onDelete('cascade');
            $table->unsignedBigInteger('id_datapengiriman');
            $table->foreign('id_datapengiriman')->references('id')->on('data_pengiriman_pakets')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('manifest_details');
    }
}
