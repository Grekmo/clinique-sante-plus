<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = \App\Models\Patient::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'cin' => strtoupper($this->faker->bothify('??######')), // بحال AB123456
            'adresse' => $this->faker->address(),
            'date_naissance' => $this->faker->date('Y-m-d', '2005-01-01'),
            'mobile' => $this->faker->phoneNumber(),
        ];
    }
}
