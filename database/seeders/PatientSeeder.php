<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run()
    {
        // يعمر 20 مريض عشوائي
        Patient::factory(20)->create();
    }
}
