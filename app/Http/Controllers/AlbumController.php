<?php

namespace App\Http\Controllers;

use App\Models\Album;


class AlbumController extends Controller
{
    public function index(Album $album)
    {
        return view('album.index', compact('album'));
    }
}
