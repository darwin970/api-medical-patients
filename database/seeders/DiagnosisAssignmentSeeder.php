<?php

namespace Database\Seeders;

use App\Models\DiagnosisAssignment;
use Illuminate\Database\Seeder;

class DiagnosisAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiagnosisAssignment::insert([
            [
                'patient_id' => 1,
                'diagnosis_id' => 1,
                'observation' => 'Diagnosis assignment 1'
            ],
            [
                'patient_id' => 1,
                'diagnosis_id' => 2,
                'observation' => 'Diagnosis assignment 2'
            ],
            [
                'patient_id' => 1,
                'diagnosis_id' => 3,
                'observation' => 'Diagnosis assignment 3'
            ],
            [
                'patient_id' => 2,
                'diagnosis_id' => 1,
                'observation' => 'Diagnosis assignment 1'
            ],
            [
                'patient_id' => 2,
                'diagnosis_id' => 2,
                'observation' => 'Diagnosis assignment 2'
            ],
            [
                'patient_id' => 2,
                'diagnosis_id' => 3,
                'observation' => 'Diagnosis assignment 3'
            ],
        ]);
    }
}
