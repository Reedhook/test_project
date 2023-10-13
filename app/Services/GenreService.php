<?php

namespace App\Services;

use App\Models\Genre;
use Exception;
use Illuminate\Support\Facades\DB;

class GenreService
{
    public function store($response){
        foreach($response as $item){
            try {
                DB::beginTransaction();
                $genre=[
                    'id'=>$item['id'],
                    'name'=>$item['name']
                ];
                Genre::firstOrCreate($genre);
                DB::commit();
            } catch (Exception $exeption) {
                DB::rollBack();
                abort(500);
            }
        }
    }
}
