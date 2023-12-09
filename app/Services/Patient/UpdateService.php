<?php

namespace App\Services\Patient;

use App\Http\Requests\Patient\UpdateRequest;
use App\Http\Responses\GeneralJsonResponse;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UpdateService
{
    private string $patientDoesNotExistsError = 'El paciente seleccionado no existe.';
    private string $patientUpdateSuccess = 'Paciente actualizado correctamente.';
    private string $patientUpdateError = 'Ocurrio un error al actualizar la informacion del paciente.';
    private string $errorToUpdatePatient = 'Error to update patient: ';
    private int $code419 = 419;

    function execute(UpdateRequest $updatePatientRequest, $patientId): JsonResponse
    {
        $patient = Patient::find($patientId);

        if (!$patient) {
            return GeneralJsonResponse::error($this->patientDoesNotExistsError, ResponseAlias::HTTP_BAD_REQUEST);
        }

        try {
            $patient->update($updatePatientRequest->toArray());

            return GeneralJsonResponse::success($this->patientUpdateSuccess, $patient);

        } catch (\Exception $exception) {
            logger($this->errorToUpdatePatient . $exception->getMessage());
            return GeneralJsonResponse::error($this->patientUpdateError, $this->code419);
        }
    }
}
