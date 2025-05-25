<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Barang;
use App\Models\Pinjaman;

class PinjamanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pinjaman::class;

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
            'name' => $this->faker->name,
            'jenis' => $this->faker->word,
            'jumlah' => $this->faker->numberBetween(-10000, 10000),
            'tglPinjam' => $this->faker->date(),
            'tglKembali' => $this->faker->date(),
            'status' => $this->faker->word,
            'hasMany' => $this->faker->word,
        ];
    }
}
