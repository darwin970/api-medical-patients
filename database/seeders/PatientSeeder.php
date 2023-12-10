<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::insert([
            [
                'first_name' => 'Darwin',
                'last_name' => 'Galindez',
                'document' => '1075308462',
                'birth_date' => '1997-12-26',
                'email' => 'darwin@gmail.com',
                'phone' => '3188766607',
                'gender' => 'male',
            ],
            [
                'first_name' => 'Pepito',
                'last_name' => 'Perez',
                'document' => '1234567890',
                'birth_date' => '2000-12-26',
                'email' => 'pepito@gmail.com',
                'phone' => '1234567890',
                'gender' => 'male',
            ]
        ]);
    }
}
