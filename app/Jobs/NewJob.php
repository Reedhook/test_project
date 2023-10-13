<?php

namespace App\Jobs;

use App\Models\Album;
use App\Services\AlbumService;
use App\Services\GenreService;
use App\Services\TagService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $chunk;
    private $album;
    private $tag;
    private $genre;
    private $key;

    public function __construct($chunk, $key)
    {
        $this->album = new AlbumService();
        $this->tag = new TagService();
        $this->genre = new GenreService();

        $this->chunk = $chunk;
        $this->key = $key;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->key === "albums") {
            $this->album->store($this->chunk);
        } elseif ($this->key === "genres") {
            $this->genre->store($this->chunk);
        } elseif ($this->key === "tags") {
            $this->tag->store($this->chunk);
        }


    }

}
