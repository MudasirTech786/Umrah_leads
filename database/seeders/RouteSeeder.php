<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            ['name' => 'Jeddah Airport  to Makkah Hotel'],
            ['name' => 'Makkah to Jeddah Airport'],
            ['name' => 'Makkah Hotel to Madina Hotel'],
            ['name' => 'Madina Hotel to Makkah Hotel'],
            ['name' => 'Madina Airport to Madina Hotel'],
            ['name' => 'Madina Hotel to Madina Airport'],
        ];

        // Loop through the types array and insert each type into the database
        foreach ($routes as $route) {
            Route::create($route);
        }
    }
}
