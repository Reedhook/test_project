<?php

namespace App\Services;

use App\Models\Track;
use Exception;
use Illuminate\Support\Facades\DB;

class TrackService
{
    public function store($response){
        foreach ($response['tracks'] as $item) {
            try {
                DB::beginTransaction();
                $trackData = [
                    'id' => $item['id'],
                    'album_id' => $response['collection']['id'],
                    'artist' => $item['artist'],
                    'name' => $item['name'],
                    'minutes' => $item['duration']['minutes'] ?? null,
                    'seconds' => $item['duration']['seconds'] ?? null,
                    'milliseconds' => $item['duration']['milliseconds'] ?? null,
                    'bpm' => $item['bpm'] ?? null,
                    'link_to_the_file' => $item['file']
                ];
                $track=Track::firstOrCreate($trackData);
                if(is_array($item['tags'])) {
                    $tagIds = $item['tags'];
                    $track->tags()->attach($tagIds);
                }
                if(is_array($item['genres'])) {
                    $genreIds = $item['genres'];
                    $track->genres()->attach($genreIds);
                }
                DB::commit();
            } catch (Exception $exeption) {
                DB::rollBack();
                abort(500);
            }
        }
    }
}
