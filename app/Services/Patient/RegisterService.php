<?php

namespace App\Services\Patient;

use App\Http\Requests\Patient\RegisterRequest;
use App\Http\Responses\GeneralJsonResponse;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;

class RegisterService
{
    private string $registeredPatientSuccess = 'Paciente registrado correctamente.';
    private string $errorRegisteringPatient = 'Ocurrio un error al registrar el paciente.';
    private string $errorToSavePatient = 'Error to save patient: ';
    private int $code419 = 419;

    function execute(RegisterRequest $patientRequest): JsonResponse
    {
        try {
            $patient = new Patient($patientRequest->toArray());
            $patient->save();

            return GeneralJsonResponse::success($this->registeredPatientSuccess, $patient);

        } catch (\Exception $exception) {
            logger($this->errorToSavePatient . $exception->getMessage());
            return GeneralJsonResponse::error($this->errorRegisteringPatient, $this->code419);
        }
    }
}
