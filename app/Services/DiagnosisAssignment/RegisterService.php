<?php

namespace App\Services\DiagnosisAssignment;

use App\Http\Requests\DiagnosisAssignment\RegisterRequest;
use App\Http\Responses\GeneralJsonResponse;
use App\Models\DiagnosisAssignment;
use Illuminate\Http\Response;

class RegisterService
{
    private string $assignmentSuccess = 'Se asigno correctamente el diagnóstico.';
    private string $assigningDiagnosisError = 'Ocurrió un error al asignar el diagnóstico.';
    private string $assignmentError = 'Error to save diagnosis assignment: ';

    function execute(RegisterRequest $registerRequest)
    {
        try {
            $diagnosisAssignment = new DiagnosisAssignment($registerRequest->toArray());
            $diagnosisAssignment->save();

            return GeneralJsonResponse::success($this->assignmentSuccess, $diagnosisAssignment);

        } catch (\Exception $exception) {
            logger($this->assignmentError . $exception->getMessage());
            return GeneralJsonResponse::error($this->assigningDiagnosisError, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
