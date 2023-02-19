<?php

namespace App\Serialize;


class PatientImportSerialize
{
    private $data;
    private $dataSerialized;

    public function handle()
    {
        $this->dataSerialized = [
            'avatar' => $this->data[0],
            'full_name' => $this->data[1],
            'mother_full_name' => $this->data[2],
            'birthday' => $this->data[3],
            'cpf' => $this->data[4],
            'cns' => $this->data[5],
            'address' => [
                'cep' => $this->data[6],
                'address' => $this->data[7],
                'number' => $this->data[8],
                'neighborhood' => $this->data[9],
                'city' => $this->data[10],
                'state' => $this->data[11],
                'complement' => isset($this->data[12]) ?? $this->data[12],
            ]
        ];;

        return $this->dataSerialized;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
