<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifptigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifptigas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('origin_id');
            $table->string('city_origin');
            $table->longtext('city_destination');
            $table->string('courier');
            $table->string('weight');
            $table->string('cost');
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
        Schema::dropIfExists('tarifptigas');
    }
}
