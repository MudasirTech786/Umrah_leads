<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransportType;

class TransportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Bus'],
            ['name' => 'Car'],
            ['name' => 'Wagon'],
            ['name' => 'Coach'],
            
        ];

        // Loop through the types array and insert each type into the database
        foreach ($types as $typeData) {
            TransportType::create($typeData);
        }
    }
}
