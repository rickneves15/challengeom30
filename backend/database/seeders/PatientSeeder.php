<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::factory()->count(30)->create()->each(function ($patient) {
            Address::factory()->create([
                'patient_id' => $patient->id
            ]);
        });
    }
}
