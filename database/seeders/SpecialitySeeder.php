<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/SpecialitySeeder.php
    public function run():void
    {
        $specialities = [
            'Cardiologie',
            'Dermatologie',
            'Pédiatrie',
            'Ophtalmologie',
            'Gynécologie',
            'Neurologie',
            'Dentisterie',
            /*'Dentiste',
            'Médecin généraliste',
            'Ophtalmologiste',
            'Pédiatre',
            'Gynécologue',
            'Cardiologue',
            'Neurologue',
            'Dermatologue',
            'Psychiatre',
            'Interniste',
            'Chirurgien',
            'Radiologue',
            'Nutritionniste',
            'ORL',
            'Rhumatologue',
            'Endocrinologue',
            'Urologue',
            'Pneumologue',*/
        ];

        foreach ($specialities as $spec) {
            \App\Models\Speciality::create(['name' => $spec]);
        }
    }

}
