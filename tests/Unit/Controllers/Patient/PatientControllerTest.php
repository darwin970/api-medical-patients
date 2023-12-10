<?php

namespace Tests\Unit\Controllers\Patient;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Tests\Unit\DataBuilder\Patient\PatientTestDataBuilder;

class PatientControllerTest extends TestCase
{
    use RefreshDatabase;

    private string $baseUrl = '/api/patients';
    private string $table = 'patients';
    private int $patientId = 2;
    private int $patientIdDelete = 3;

    function testRegister()
    {
        $url = $this->baseUrl . '/register';
        $patientBuilder = new PatientTestDataBuilder();
        $dataPatient = $patientBuilder->build()->toArray();

        $response = $this->post($url, $dataPatient);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas($this->table, $dataPatient);
    }

    function testUpdate()
    {
        $url = $this->baseUrl . '/' . $this->patientId;
        $patientBuilder = new PatientTestDataBuilder();
        $patientData = $patientBuilder->build();
        $patientData->id = 2;
        $patientData = $patientData->toArray();

        Patient::withoutTrashed()->create($patientData);
        $response = $this->patch($url, $patientData);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas($this->table, $patientData);
    }

    function testListAll()
    {
        $url = $this->baseUrl . '/list-all';
        $response = $this->get($url);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertNotEmpty($response);
    }

    function testSearch()
    {
        $url = $this->baseUrl . '/search?filter=test';
        $response = $this->get($url);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertNotEmpty($response);
    }

    function testDelete()
    {
        $url = $this->baseUrl . '/' . $this->patientIdDelete;

        $patientBuilder = new PatientTestDataBuilder();
        $patientData = $patientBuilder->build()->toArray();
        Patient::withoutTrashed()->create($patientData);

        $response = $this->delete($url);

        $response->assertStatus(Response::HTTP_OK);
    }
}
