<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;
    public function definition()
    {
        return [
            'avatar' =>  fake()->imageUrl(),
            'full_name' =>  fake()->name(),
            'mother_full_name' =>  fake()->name('female'),
            'birthday' =>  fake()->date('Y-m-d'),
            'cpf' =>  fake()->cpf(false),
            'cns' => $this->faker->cns,
        ];
    }
}
