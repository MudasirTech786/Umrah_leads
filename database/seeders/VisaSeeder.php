<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visa;

class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visa = Visa::create([
            'hajj_charges' => '10000',
            'umrah_charges' => '30000',
            'current_currency' => '80'
        ]);
    }
}
