<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use App\Services\PatientService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    use ResponseTrait;

    public function __construct(private PatientService $patientService)
    {
    }

    public function index()
    {
        try {
            $patients = $this->patientService->fetchAll();
            return $this->responseSuccess($patients, 'Patients List Fetch Successfully !');
        } catch (\Exception $e) {
            return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(PatientRequest $request)
    {
        try {
            $validation = $request->validated();
            $patient = $this->patientService->create($request->all());
            return $this->responseSuccess($patient, 'New Patient Created Successfully !');
        } catch (\Exception $e) {
            return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        try {

            $patient = $this->patientService->fetchOne($id);
            if (is_null($patient)) {
                return $this->responseError(null, 'Patient Not Found', Response::HTTP_NOT_FOUND);
            }

            return $this->responseSuccess($patient, 'Patient Details Fetch Successfully !');
        } catch (\Exception $e) {
            return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(PatientRequest $request, $id)
    {
        try {
            $validation = $request->validated();
            $patient = $this->patientService->update($id, $request->all());
            if (is_null($patient)) {
                return $this->responseError(null, 'Patient Not Found', Response::HTTP_NOT_FOUND);
            }

            return $this->responseSuccess($patient, 'Patient Updated Successfully !');
        } catch (\Exception $e) {
            return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $patient = $this->patientService->delete($id);
            if (is_null($patient)) {
                return $this->responseError(null, 'Patient Not Found', Response::HTTP_NOT_FOUND);
            }

            return $this->responseSuccess($patient, 'Patient Deleted Successfully !');
        } catch (\Exception $e) {
            return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}