<?php

namespace App\Console\Commands;

use App\Models\Transport;
use App\Jobs\SendTransportValidityMails;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessTransportValidity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:transport-validity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $transport = Transport::with(['costs', 'route'])->get();
        
        Log::info($transport);
        foreach ($transport as $transports) {
            SendTransportValidityMails::dispatch($transports);
        }
    
        $this->info('Hotel validity expiration notifications dispatched successfully.');
    }
}
