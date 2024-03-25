<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RouteSeeder;
use Database\Seeders\TransportTypeSeeder;
use Database\Seeders\RoomSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RouteSeeder::class,
            TransportTypeSeeder::class,
            RoomSeeder::class,
        ]);
    }
}
