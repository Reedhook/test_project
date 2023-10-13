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
        Schema::create('track_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('track_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();

            $table->foreign('track_id','track_tag_track_fk')->on('tracks')->references('id');
            $table->foreign('tag_id','track_tag_tag_fk')->on('tags')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_t_ags');
    }
};
