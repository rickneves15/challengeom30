<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Class AddressService.
 */
class AddressService
{
    public function getCep($cep)
    {
        $url = "http://viacep.com.br/ws/ws/$cep/json";
        $response = Http::get($url);

        return Cache::remember("cep:$cep", now()->addDay(1), function () use ($response) {
            $data = $response->json();
            $address = [
                'cep' =>  str_replace('-', '', $data['cep']),
                'address' => $data['logradouro'],
                'complement' => $data['complemento'],
                'neighborhood' => $data['bairro'],
                'city' => $data['localidade'],
                'state' => $data['uf'],
            ];
            return $address;
        });
    }
}
