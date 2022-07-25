<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifInternasionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longtext('courier_name')->nullable();
            $table->longtext('courier_code')->nullable();
            $table->longtext('courier_type')->nullable();
            $table->longtext('country_code')->nullable();
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_name');
            $table->string('country_code');
            $table->timestamps();
        });
        Schema::create('tarif_internasionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('courires_id');
            $table->unsignedBigInteger('countries_id');
            $table->integer('min');
            $table->integer('max');
            $table->integer('cost');
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
        Schema::dropIfExists('couriers');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('tarif_internasionals');
    }
}
