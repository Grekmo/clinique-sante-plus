<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MigrateOldDoctorsSeeder extends Seeder
{
    public function run(): void
    {
        $oldDoctors = Doctor::whereNull('user_id')->get();

        foreach ($oldDoctors as $doctor) {
            DB::transaction(function () use ($doctor) {
                
                $safeName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $doctor->nom));
                $email = $safeName . '_' . $doctor->id . '@clinichub.com';

                $user = User::create([
                    'name'     => $doctor->nom,
                    'email'    => $email,
                    'password' => Hash::make('password123'),
                    'role'     => 'doctor', 
                ]);

                $doctor->update([
                    'user_id' => $user->id
                ]);
            });
        }
    }
}