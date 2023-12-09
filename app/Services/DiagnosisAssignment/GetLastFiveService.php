<?php

namespace App\Services\DiagnosisAssignment;

use App\Http\Responses\GeneralJsonResponse;
use App\Models\DiagnosisAssignment;

class GetLastFiveService
{
    private int $months = 6;
    private int $quantityDiagnosis = 5;

    function execute()
    {
        $deadline = now()->subMonths($this->months);

        $topDiagnoses = DiagnosisAssignment::withoutTrashed()
            ->select('diagnosis_id')
            ->selectRaw('COUNT(*) as total')
            ->where('created_at', '>=', $deadline)
            ->groupBy('diagnosis_id')
            ->orderByDesc('total')
            ->take($this->quantityDiagnosis)
            ->with('diagnosis')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->diagnosis->name,
                    'total' => $item->total
                ];
            })
            ->toArray();

        return GeneralJsonResponse::successList($topDiagnoses);
    }
}
