<?php

namespace App\Services;

use App\Models\Album;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumService
{
    public function store($response)
    {
        foreach ($response as $item) {
            try {
                DB::beginTransaction();
                $album = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'description' => $item['description'] ?? null,
                    'count_tracks' => $item['total_count'],
                    'cover' => isset($item['cover']) ? $item['id'] . '.jpg' : null,
                    'minutes' => $item['total_duration']['minutes'] ?? null,
                    'seconds' => $item['total_duration']['seconds'] ?? null,
                    'milliseconds' => $item['total_duration']['milliseconds'] ?? null,
                ];
                Album::firstOrCreate($album);
                DB::commit();
                if (isset($item['cover'])) {
                    Storage::disk('public')->put('/images/' . $album['cover'], file_get_contents
                    ($item['cover']));
                }
            } catch (Exception $exeption) {
                DB::rollBack();
                abort(500);
            }
        }
    }
}
