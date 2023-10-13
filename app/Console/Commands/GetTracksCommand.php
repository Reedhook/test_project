<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiController;
use Illuminate\Console\Command;

class GetTracksCommand extends Command
{

    protected $signature = 'api:get-track';

    protected $description = 'Get information about tracks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiController = new ApiController();
        $apiController->getTracks();
    }

}
