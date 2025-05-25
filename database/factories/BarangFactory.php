<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Barang;

class BarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'name' => $this->faker->name,
            'merk' => $this->faker->word,
            'image' => $this->faker->word,
            'stock' => $this->faker->word,
            'status' => $this->faker->word,
            'hasMany' => $this->faker->word,
        ];
    }
}
