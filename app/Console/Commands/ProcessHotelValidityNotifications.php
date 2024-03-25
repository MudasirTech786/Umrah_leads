<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendHotelValidityExpirationNotification;
use App\Models\HotelRoom;
use App\Models\Room;

class ProcessHotelValidityNotifications extends Command
{
    protected $signature = 'process:hotel-validity-notifications';

    protected $description = 'Dispatch hotel validity expiration notifications';

    public function handle()
    {
        $hotelRooms = HotelRoom::with('hotel')->get();

    foreach ($hotelRooms as $hotelRoom) {
        SendHotelValidityExpirationNotification::dispatch($hotelRoom);
    }

    $this->info('Hotel validity expiration notifications dispatched successfully.');
    }
}
