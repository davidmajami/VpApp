<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ime' => $this->faker->name(),
            'prezime' => $this->faker->unique->email(),
            'username' => $this->faker->text(255),
            'password' => \Hash::make('password'),
            'uloga' => '',
            'telefon' => $this->faker->text(255),
            'email' => $this->faker->email(),
            'adresa' => $this->faker->text(255),
            'jmbg' => $this->faker->text(255),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
