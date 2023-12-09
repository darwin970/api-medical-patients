<?php

namespace App\Http\Requests\Patient;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
        $patientId = $this->route('patientId');
        logger('id: ' . $patientId);

        return [
            'id' => 'required|numeric',
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'document' => [
                'required',
                'numeric',
                'digits_between:8,10',
                Rule::unique('patients', 'document')->ignore($patientId),
            ],
            'birth_date' => 'required|date|before_or_equal:today',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'gender' => 'required|in:male,female'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'El campo nombre es obligatorio.',
            'last_name.required' => 'El campo apellido es obligatorio.',
            'document.required' => 'El campo numero de documento es obligatorio.',
            'document.unique' => 'El documento ingresado ya se encuentra registrado.',
            'birth_date.required' => 'El campo fecha de nacimiento es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'phone.required' => 'El campo telefono es obligatorio.',
            'phone.digits' => 'El telefono debe contener 10 digitos.',
            'gender.required' => 'El campo genero es obligatorio.',
            'gender.in' => 'El genero seleccionado no es valido.'
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
