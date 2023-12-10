<?php

namespace Tests\Unit\Models;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Unit\DataBuilder\Patient\PatientTestDataBuilder;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    function testCreatePatient(): void
    {
        $patientBuilder = new PatientTestDataBuilder();
        $patientData = $patientBuilder->build()->toArray();

        $patient = Patient::withoutTrashed()->create($patientData);

        $this->assertNotNull($patient);
        $this->assertEquals(4, $patient->id);
        $this->assertEquals('male', $patient->gender);
    }
}
