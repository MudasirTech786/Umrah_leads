<?php

namespace App\Jobs;

use App\Models\HotelRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ValidityNotificationMail;
use App\Mail\ValidityThreeDaysNotificationMail;
use App\Mail\ValidityTwoDaysNotificationMail;
use App\Mail\ValidityOneDayNotificationMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SendHotelValidityExpirationNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $Hotel_room;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(HotelRoom $Hotel_room)
    {
        $this->Hotel_room = $Hotel_room;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $validity = Carbon::parse($this->Hotel_room->validity);
        $sevenDaysBeforeValidity = $validity->copy()->subDays(7);
        $threeDaysBeforeValidity = $validity->copy()->subDays(3);
        $twoDaysBeforeValidity = $validity->copy()->subDays(2);
        $oneDaysBeforeValidity = $validity->copy()->subDays(1);
        $currentDate = now();
        Log::info($this->Hotel_room);

        if ($currentDate->isSameDay($sevenDaysBeforeValidity)) {
            Log::info('Hotel room expiration is within 7 days.');
            // Uncomment and implement email sending logic if necessary
            $mail = new ValidityNotificationMail($this->Hotel_room);
            $mail->from('example@gmail.com', 'Hajj & Ummrah');
            Mail::to('Mudasirasfi420@gmail.com')->send($mail);
        } 
        
        elseif ($currentDate->isSameDay($threeDaysBeforeValidity)) {
            $mail = new ValidityThreeDaysNotificationMail($this->Hotel_room);
            $mail->from('example@gmail.com', 'Hajj & Ummrah');
            Mail::to('Mudasirasfi420@gmail.com')->send($mail);
        } 
        
        elseif ($currentDate->isSameDay($twoDaysBeforeValidity)) {
            $mail = new ValidityTwoDaysNotificationMail($this->Hotel_room);
            $mail->from('example@gmail.com', 'Hajj & Ummrah');
            Mail::to('Mudasirasfi420@gmail.com')->send($mail);
        }
        
        elseif ($currentDate->isSameDay($oneDaysBeforeValidity)) {
            $mail = new ValidityOneDayNotificationMail($this->Hotel_room);
            $mail->from('example@gmail.com', 'Hajj & Ummrah');
            Mail::to('Mudasirasfi420@gmail.com')->send($mail);
        }
    }
}
