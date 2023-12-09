<?php

namespace App\Services\Patient;

use App\Http\Responses\GeneralJsonResponse;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DeleteService
{
    private string $successfulRemoval = 'Se elimino correctamente el paciente';
    private string $patientDoesNotExist = 'El paciente seleccionado no existe.';

    function execute($patientId): JsonResponse
    {
        $patient = Patient::withoutTrashed()->find($patientId);

        if (!$patient) {
            return GeneralJsonResponse::error($this->patientDoesNotExist, ResponseAlias::HTTP_BAD_REQUEST);
        }

        $patient->deletePatientAndDiagnoses();

        return GeneralJsonResponse::success($this->successfulRemoval);
    }
}
