<?php

namespace App\Jobs;

use App\Models\Patient;
use App\Services\PatientService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PatientImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $patientService;
    public $data;

    public function __construct($data)
    {
        $this->patientService = new PatientService();
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->validateData()) {
            $this->patientService->create($this->data);
        }
    }

    public function validateData(): bool
    {
        $data = $this->data;
        if (
            empty($data['avatar']) || $data['avatar'] == ''
            && empty($data['full_name']) || $data['full_name'] == ''
            && empty($data['mother_full_name']) || $data['mother_full_name'] == ''
            && empty($data['birthday']) || $data['birthday'] == ''
            && empty($data['cpf']) || $data['cpf'] == ''
            && empty($data['cns']) || $data['cns'] == ''
            && empty($data['address']['cep']) || $data['address']['cep'] == ''
            && empty($data['address']['address']) || $data['address']['address'] == ''
            && empty($data['address']['number']) || $data['address']['number'] == ''
            && empty($data['address']['neighborhood']) || $data['address']['neighborhood'] == ''
            && empty($data['address']['city']) || $data['address']['city'] == ''
            && empty($data['address']['state']) || $data['address']['state'] == ''
        ) {
            return false;
        }

        return true;
    }
}
