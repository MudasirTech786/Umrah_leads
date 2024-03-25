<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['name' => 'Single'],
            ['name' => 'Double'],
            ['name' => 'Triple'],
            ['name' => 'Quad'],
        ];
        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
