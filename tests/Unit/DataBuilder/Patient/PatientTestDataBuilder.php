<?php

namespace Tests\Unit\DataBuilder\Patient;

use App\Models\Patient;

class PatientTestDataBuilder
{
    private Patient $patient;

    function __construct()
    {
        $this->patient = new Patient();
        $this->patient->first_name = 'Darwin';
        $this->patient->last_name = 'Labs';
        $this->patient->document = '1234567890';
        $this->patient->birth_date = '1990-12-12';
        $this->patient->email = 'test@gmail.com';
        $this->patient->phone = '1234567890';
        $this->patient->gender = 'male';
    }

    function build(): Patient
    {
        return $this->patient;
    }
}
