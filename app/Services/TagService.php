<?php

namespace App\Services;

use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\DB;

class TagService
{
    public function store($response){
        foreach($response as $item){
            try {
                DB::beginTransaction();
                $tag=[
                    'id'=>$item['id'],
                    'name'=>$item['name']
                    ];
                Tag::firstOrCreate($tag);
                DB::commit();
            } catch (Exception $exeption) {
                DB::rollBack();
                abort(500);
            }
        }
    }
}
