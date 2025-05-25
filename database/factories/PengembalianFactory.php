<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Barang;
use App\Models\Pengembalian;
use App\Models\Pinjaman;

class PengembalianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengembalian::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barang_id' => Barang::factory(),
            'pinjaman_id' => Pinjaman::factory(),
            'belongsTo' => $this->faker->word,
            'jumlah' => $this->faker->numberBetween(-10000, 10000),
            'tglKembali' => $this->faker->date(),
            'status' => $this->faker->word,
        ];
    }
}
