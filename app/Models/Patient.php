<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'document',
        'birth_date',
        'email',
        'phone',
        'gender'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function diagnosis(): BelongsToMany
    {
        return $this->belongsToMany(Diagnosis::class, 'diagnoses_assignment', 'patient_id', 'diagnosis_id')
            ->withPivot('observation');
    }

    function diagnoses(): HasMany
    {
        return $this->hasMany(DiagnosisAssignment::class, 'patient_id');
    }

    function deletePatientAndDiagnoses(): void
    {
        $this->diagnoses()->delete();
        $this->delete();
    }
}
