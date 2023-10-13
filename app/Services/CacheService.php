<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{

        public function check($key_cache): ? array
        {
            if (Cache::has($key_cache)) {
                $cache=Cache::get($key_cache);
                return $cache;
            }
                return null;
        }

    public function add($request,$key_cache):void{
        Cache::put($key_cache,$request, 5 * 60);
    }
}
