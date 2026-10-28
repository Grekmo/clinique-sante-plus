<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $user = User::create([
            'name' => 'Mouad Grich',
            'email' => 'grish@example.com',
            'password' => bcrypt('password123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'nom' => 'Grish',
            'prenom' => 'Mouad',
            'email' => 'grish@example.com',
            'cin' => 'AA95198',
            'mobile' => '0631070322',
            'adresse' => 'AMAL 1 J5 CYM RABAT',
            'date_naissance' => '2000-08-14',
            'user_id' => $user->id
        ]);
    }
}
