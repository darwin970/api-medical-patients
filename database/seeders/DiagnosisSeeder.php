<?php

namespace Database\Seeders;

use App\Models\Diagnosis;
use Illuminate\Database\Seeder;

class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diagnosis::insert([
            [
                'name' => 'ACTINOMICOSIS',
                'description' => 'SEPSIS ACTINOMICOTICA'
            ],
            [
                'name' => 'OTRAS SEPSIS	',
                'description' => 'SEPSIS DEBIDA A HAEMOPHILUS INFLUENZAE'
            ],
            [
                'name' => 'TOS FERINA',
                'description' => 'TOS FERINA DEBIDA A BORDETELLA PARAPERTUSSIS'
            ],
            [
                'name' => 'LISTERIOSIS',
                'description' => 'MENINGITIS Y MENINGOENCEFALITIS LISTERIANA'
            ],
            [
                'name' => 'LEPRA LEPROMATOSA',
                'description' => 'LEPRA [ENFERMEDAD DE HANSEN]'
            ],
            [
                'name' => 'PESTE',
                'description' => 'PESTE'
            ],
            [
                'name' => 'TUBERCULOSIS DE OTROS ORGANOS',
                'description' => 'TUBERCULOSIS DEL APARATO GENITOURINARIO'
            ]
        ]);
    }
}
