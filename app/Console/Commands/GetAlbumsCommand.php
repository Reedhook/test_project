<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiController;
use Illuminate\Console\Command;

class GetAlbumsCommand extends Command
{

    protected $signature = 'api:get-data';

    protected $description = 'Get information about albums,tags and genres';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiController = new ApiController();
        $apiController->getAlbums();
    }

}
