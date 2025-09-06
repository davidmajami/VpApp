<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\GrupaProizvoda;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupaProizvodaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GrupaProizvoda::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv_grupe' => $this->faker->text(255),
            'popust' => $this->faker->randomNumber(0),
        ];
    }
}
