<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiagnosisAssignment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'diagnoses_assignment';

    protected $fillable = [
        'patient_id',
        'diagnosis_id',
        'observation'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosis_id');
    }
}
