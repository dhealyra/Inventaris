<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Barang;
use App\Models\BarangMasuk;

class BarangMasukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BarangMasuk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barang_id' => Barang::factory(),
            'belongsTo' => $this->faker->word,
            'jumlah' => $this->faker->numberBetween(-10000, 10000),
            'tglMasuk' => $this->faker->date(),
            'keterangan' => $this->faker->text,
        ];
    }
}
