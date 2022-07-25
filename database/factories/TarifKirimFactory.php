<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TarifKirim;
use Faker\Generator as Faker;
class TarifKirimFactory extends Factory
{
    protected $model = \App\Models\TarifKirim::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'origin_id'=>1,
        'tujuan'=>$this->faker->text,
        'nama_kabupaten_penerima'=>$this->faker->text,
        'nama_kecamatan_penerima'=>$this->faker->text,
        'layanan'=>'darat',
        'min_kg'=>1,
        'max_kg'=>1,
        'tarif' =>'120000',
            ];
    }
}
