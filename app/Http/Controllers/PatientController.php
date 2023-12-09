<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\RegisterRequest;
use App\Http\Requests\Patient\UpdateRequest;
use App\Http\Responses\GeneralJsonResponse;
use App\Models\Patient;
use App\Services\Patient\DeleteService;
use App\Services\Patient\RegisterService;
use App\Services\Patient\UpdateService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    protected RegisterService $registerPatientService;
    protected UpdateService $updatePatientService;
    protected DeleteService $deleteService;

    function __construct(RegisterService $registerPatientService,
                         UpdateService $updatePatientService,
                         DeleteService $deleteService)
    {
        $this->registerPatientService = $registerPatientService;
        $this->updatePatientService = $updatePatientService;
        $this->deleteService = $deleteService;
    }

    function register(RegisterRequest $registerPatientRequest): JsonResponse
    {
        return $this->registerPatientService->execute($registerPatientRequest);
    }

    function update(UpdateRequest $updatePatientRequest, $patientId): JsonResponse
    {
        return $this->updatePatientService->execute($updatePatientRequest, $patientId);
    }

    function listAll(): JsonResponse
    {
        $patients = Patient::withoutTrashed()
            ->with('diagnosis')
            ->get()
            ->toArray();

        return GeneralJsonResponse::successList($patients);
    }

    function search(Request $request): JsonResponse
    {
        $filter = $request->query('filter');

        $patientsFiltered = Patient::withoutTrashed()
            ->where('first_name', 'like', '%' . $filter . '%')
            ->orWhere('last_name', 'like', '%' . $filter . '%')
            ->orWhere('document', 'like', '%' . $filter . '%')
            ->get();

        return GeneralJsonResponse::successList($patientsFiltered->toArray());
    }

    function delete($patientId): JsonResponse
    {
        return $this->deleteService->execute($patientId);
    }
}
