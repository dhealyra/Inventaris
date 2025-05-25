<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Barang;
use App\Models\BarangKeluar;

class BarangKeluarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BarangKeluar::class;

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
            'tglKeluar' => $this->faker->date(),
            'keterangan' => $this->faker->text,
        ];
    }
}
