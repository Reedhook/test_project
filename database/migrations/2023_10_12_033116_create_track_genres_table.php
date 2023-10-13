<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('track_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('track_id')->nullable();
            $table->unsignedBigInteger('genre_id')->nullable();

            $table->foreign('track_id','track_genre_track_fk')->on('tracks')->references('id');
            $table->foreign('genre_id','track_genre_genre_fk')->on('genres')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_genres');
    }
};
