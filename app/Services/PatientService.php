<?php

namespace App\Services;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;

/**
 * Class Patient.
 */
class PatientService
{

    public function fetchAll()
    {
        $patients = Patient::all();

        if (!$patients) {
            return null;
        }

        return $patients;
    }

    public function fetchOne($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return null;
        }

        return $patient;
    }

    public function create(array $data)
    {
        $patient = Patient::create($data);

        return $patient;
    }

    public function update($id, array $data)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            $patient = $this->create($data);
        }

        $patient->update($data);

        return $patient;
    }

    public function delete($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return null;
        }

        Patient::destroy($id);
        return true;
    }
}
