<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TarifKirimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\TarifKirim::factory()->count(500)->create(); 
    }
}
