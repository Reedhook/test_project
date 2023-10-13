<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([ 'controller'=> ApiController::class], function(){
    Route::get('/', 'index')->name('index');
});
Route::group([ 'prefix'=>'albums','controller'=> AlbumController::class], function(){
    Route::get('/{album}', 'index')->name('album.index');
});

