<?php

namespace Database\Factories;

use App\Models\Speciality;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'cin' => strtoupper($this->faker->bothify('??######')),
            'mobile' => '06' . $this->faker->numberBetween(10000000, 99999999),
            'adresse' => $this->faker->city(),
            'date_naissance' => $this->faker->date(),
            'speciality_id' => function () {
                return \App\Models\Speciality::inRandomOrder()->first()->id;
            },
        ];
    }
}
