<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosisAssignment\RegisterRequest;
use App\Services\DiagnosisAssignment\GetLastFiveService;
use App\Services\DiagnosisAssignment\RegisterService;

class DiagnosisAssignmentController extends Controller
{
    protected RegisterService $registerService;
    protected GetLastFiveService $getLastFiveService;

    function __construct(RegisterService $registerService,
                         GetLastFiveService $getLastFiveService)
    {
        $this->registerService = $registerService;
        $this->getLastFiveService = $getLastFiveService;
    }

    function register(RegisterRequest $registerRequest)
    {
        return $this->registerService->execute($registerRequest);
    }

    function getLatest()
    {
        return $this->getLastFiveService->execute();
    }
}
