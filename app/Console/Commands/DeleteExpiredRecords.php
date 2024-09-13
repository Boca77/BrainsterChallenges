<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Vehicle;
use Illuminate\Console\Command;

class DeleteExpiredRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-records';

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
        $expiredVehicles = Vehicle::onlyTrashed()
            ->where('insurance_date', '<', Carbon::now())
            ->get();

        foreach ($expiredVehicles as $vehicle) {
            $vehicle->forceDelete();
        }
    }
}
