<?php

namespace Database\Factories;

use App\Utils\Utils;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $url = "geradornv.com.br/wp-json/api/cep/random-by-states?state=SP";
        $response = Http::get($url);
        $address = $response->json();
        return [
            'cep' => $address['cep'],
            'address' => $address['street'],
            'number' => fake()->buildingNumber(),
            'neighborhood' => $address['neighborhood'],
            'city' => $address['city'],
            'state' => $address['state'],
        ];
    }
}
