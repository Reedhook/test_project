<?php


namespace App\Http\Controllers;

use App\Jobs\NewJob;
use App\Jobs\StoreTracks;
use App\Services\CacheService;
use GuzzleHttp\Promise;
use App\Models\Album;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://distributors.enter.yoga/',
            'headers' => [
                'token' => 'uX281G3fueNboQvSisWUga2tyDck5QL8',
            ],
        ]);
    }

    public function index()
    {
        $per_page=10;
        $total_count=Album::pluck('id')->count();
        $albums = Album::simplePaginate($per_page);
        return view('main', compact('albums', 'per_page','total_count'));
    }

    public function getAlbums()
    {
        $promises = [
            'albums' => $this->client->getAsync('/albums'),
            'tags' => $this->client->getAsync('/tags'),
            'genres' => $this->client->getAsync('/genres'),
        ];
        $responses = Promise\Utils::unwrap($promises);
        foreach ($responses as $key => $response) {
            if ($response->getStatusCode() == 200) {
                $item = json_decode($response->getBody()->getContents(), true);
                $chunks = array_chunk($item[$key], 10);
                foreach ($chunks as $chunk) {
                    dispatch(new NewJob($chunk, $key));
                }
            }
        }
    }

    public function getTracks()
    {
        $table = DB::table('albums')->pluck('id');
        foreach ($table as $id) {
            $response = $this->client->request('GET', '/albums/' . $id);
            $result = json_decode($response->getBody()->getContents(), true);
            dispatch(new StoreTracks($result));
        }
    }
}

