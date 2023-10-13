<?php

namespace App\Jobs;

use App\Services\TrackService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreTracks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $response;
    private $track;
    /**
     * Create a new job instance.
     */
    public function __construct($response)
    {
        $this->response = $response;
        $this->track=new TrackService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->track->store($this->response);
    }
}
