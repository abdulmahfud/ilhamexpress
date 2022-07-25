<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalToGajikaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gajikaryawans', function (Blueprint $table) {
            $table->decimal('total_gaji', 16, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gajikaryawans', function (Blueprint $table) {
            $table->dropColumn('total_gaji');
        });
    }
}
