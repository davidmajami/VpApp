<?php

namespace Database\Factories;

use App\Models\Narudzbina;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NarudzbinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Narudzbina::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datum_narudzbine' => $this->faker->dateTime(),
            'nacin_placanja' => $this->faker->text(255),
            'ukupna_cena' => $this->faker->randomNumber(0),
            'kupac_id' => \App\Models\User::factory(),
            'zaposleni_id' => \App\Models\User::factory(),
        ];
    }
}
