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
        // $patients = Patient::with('address')->paginate(5);
        $patients = Patient::with('address')->get();
        return $patients;
    }

    public function fetchOne($id)
    {
        $patient = Patient::with('address')->find($id);

        if (!$patient) {
            return null;
        }

        return $patient;
    }

    public function create(array $data)
    {
        $addressData = $data['address'];
        unset($data['address']);
        $patientData = $data;

        $patient = Patient::create($patientData);

        $patient->address()->create($addressData);

        $patient = $this->fetchOne($patient['id']);

        return $patient;
    }

    public function update($id, array $data)
    {
        $patient = $this->fetchOne($id);

        if (!$patient) {
            $patient = $this->create($data);
        }

        $patientAux = $patient->toArray();
        $addressAux = $patientAux['address'];

        $patientData = array_merge($patientAux, $data);
        $addressData = array_merge($patientAux['address'], $data['address']);
        unset($patientData['address']);

        $patient->update($patientData);

        $patient->address()->update($addressData);

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
