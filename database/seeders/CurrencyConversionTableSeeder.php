<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CurrencyConversion;

class CurrencyConversionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currency_conversion = CurrencyConversion::create([
            'sar_to_usd' => 0.27,
            'sar_to_pkr' => 74,
            'default_currency' => 'sar'
        ]);
    }
}
