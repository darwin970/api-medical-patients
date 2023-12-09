<?php

namespace App\Http\Requests\DiagnosisAssignment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_id' => [
                'required',
                Rule::exists('patients', 'id'),
            ],
            'diagnosis_id' => [
                'required',
                Rule::exists('diagnoses', 'id'),
            ],
            'observation' => 'nullable|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required' => 'Debe seleccionar un paciente.',
            'patient_id.exists' => 'El paciente seleccionado no existe.',
            'diagnosis_id.required' => 'Debe seleccionar un diagnóstico.',
            'diagnosis_id.exists' => 'El diagnóstico seleccionado no existe.',
            'observation.max' => 'La observacón no puede contener mas de 255 caracteres.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation error',
            'errors'    => $validator->errors(),
        ])->setStatusCode(Response::HTTP_BAD_REQUEST));
    }
}
